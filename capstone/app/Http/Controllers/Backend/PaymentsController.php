<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Carbon;
class PaymentsController extends Controller
{
    public function viewPayments(){
        $payments = Payment::latest()->get();
        $reservations = Reservation::get(); 
        $users = User::get();
        return view('admin.payments.all_payments',compact('payments','users','reservations'));
    }

    public function makePayment(){
        $reservations = Reservation::get(); 
        $users = User::get();
        return view('admin.payments.make_payment', compact('users', 'reservations'));
    }

    public function storePayment(Request $request){
        Payment::insert([
            'guest_name' => $request->guest_name,
            'reservation_ref_no' => $request->reservation_ref_no,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'transaction_ref_no' => $request->transaction_ref_no,
            'notes' => $request->notes,
            'status' => 'completed',
            'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
        ]);
        $reservation = Reservation::where('reference_no', $request->reservation_ref_no)->first();
        $new_total_cost = $reservation->total_cost - $request->amount;

        $reservation->update(['total_cost'=> $new_total_cost]);

        $notification = array(
            'message' => 'Payment submitted successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.payments')->with($notification);
    }

    public function viewPayment($id){
        $payment = Payment::findOrFail($id);
        $reservations = Reservation::get(); 
        $users = User::get();
        $rooms = Room::get();
        return view('admin.payments.view_payment',compact('payment','users','reservations','rooms'));
    }

    public function updatePaymentStatus(Request $request,$id){
        $status = $request->query('status');
        $payment = Payment::findOrFail($id);
        $reservation_status = Reservation::where('reference_no',$payment->reservation_ref_no)->first();
        $room_status = Room::where('id',$reservation_status->room_id)->first();
        if($status == 'completed'){
            $payment->update([
                'status' => $status,
            ]);
            $room_status->update([
                'status' => 0,
            ]);
            $notification = array(
                'message' => 'Payment confirmed successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.payments')->with($notification);
        }elseif($status == 'failed'){
            $payment->update([
                'status' => $status,
            ]);
            $reservation_status->update([
                'status' => 'cancelled'
            ]);
            $room_status->update([
                'status' => 1,
            ]);
            $notification = array(
                'message' => 'Payment reservation marked as failed.', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.payments')->with($notification);
        }
    }
}
