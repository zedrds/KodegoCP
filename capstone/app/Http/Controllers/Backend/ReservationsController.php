<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\UnitType;
use App\Models\Room;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Carbon;

class ReservationsController extends Controller
{
    public function allReservations(){
        $reservations = Reservation::latest()->get();
        $users = User::get();
        $rooms = Room::get();
        
        return view('admin.reservations.all_reservations',compact('reservations','users','rooms'));
    }
    public function viewReservation($id){
        $reservation = Reservation::findOrFail($id);
        $users = User::get();
        $rooms = Room::get();
        $payments = Payment::get();
        return view('admin.reservations.view_reservation',compact('reservation','users','rooms','payments'));
    }
    public function addReservations(){
        $unit_types = UnitType::get();
        $rooms = Room::orderBy('room_title','ASC')->get();
        $users = User::orderBy('username','ASC')->get();
        return view('admin.reservations.add_reservation',compact('rooms','unit_types','users'));
    }

    public function getRoomName($unit_type){
        $rooms = Room::where('unit_type',$unit_type)->orderBy('room_title', 'ASC')->get();
        return json_encode($rooms);
    }
   

    public function storeReservations(Request $request){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($characters), 0, 10);
        $dateString = date('Ymd');
        $ref_no = 'UNW' . $dateString . $randomString;
        
        while (Reservation::where('reference_no', $ref_no)->exists()) {
            $randomString = substr(str_shuffle($characters), 0, 10);
            $ref_no = 'UNW' . $dateString . $randomString;
        }


        
        

        Reservation::insert([
            'guest_name' => $request->guest_name ?? $request->guest_username,
            'room_id' => $request->room_title,
            'reference_no' => $ref_no,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'total_cost' => $request->total_cost,
            'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
        ]);

        Room::where('id',$request->room_title)->update(['status'=>0]);

        $notification = array(
            'message' => 'Reservation created successfully', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.reservations')->with($notification);
    }

    public function getReservationPayor($guest_name){
        $reservation_ref_no = Reservation::where('guest_name',$guest_name)->latest()->get();
        return json_encode($reservation_ref_no);
    }

    public function updateReservationStatus(Request $request,$id){
        $status = $request->query('status');
        $reservation = Reservation::findOrFail($id);
        $room_status = Room::where('id',$reservation->room_id)->first();
        if($status == 'completed'){
            $reservation->update([
                'status' => 'completed'
            ]);
            $room_status->update([
                'status' => 1,
            ]);
            $notification = array(
                'message' => 'Reservation marked as completed successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.reservations')->with($notification);
        }elseif($status == 'cancelled'){
            $reservation->update([
                'status' => 'cancelled'
            ]);
            $room_status->update([
                'status' => 1,
            ]);
            $notification = array(
                'message' => 'Reservation cancelled successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.reservations')->with($notification);
        }elseif($status == 'confirmed'){
            $reservation->update([
                'status' => 'confirmed'
            ]);
            $room_status->update([
                'status' => 0,
            ]);
            $notification = array(
                'message' => 'Reservation confirmed successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.reservations')->with($notification);
        }elseif($status == 'pending'){
            $reservation->update([
                'status' => 'pending'
            ]);
            $room_status->update([
                'status' => 0,
            ]);
            $notification = array(
                'message' => 'Reservation marked as pending successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->route('all.reservations')->with($notification);
        }
    }
   
    // public function getRoomName($unit_type){
    //     $rooms = Room::where('unit_type',$unit_type)->orderBy('room_title', 'ASC')->get();
    //     return json_encode($rooms);
    // }

    

//     public function getDates(){
//     $reservations = Reservation::whereNotIn('status', ['completed', 'cancelled'])->get(['check_in', 'check_out']);

//     return response()->json($reservations);
// }
}
