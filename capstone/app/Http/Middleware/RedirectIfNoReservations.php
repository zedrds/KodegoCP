<?php

namespace App\Http\Middleware;

use App\Models\Reservation;
use App\Models\Payment;
use Closure;
use Illuminate\Http\Request;

class RedirectIfNoReservations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
{
    $pending_reservations = Reservation::where('status', 'pending')->get();
    if ($pending_reservations->count() == 0) {
        
        $notification = array(
            'message' => 'No pending reservations.', 
            'alert-type' => 'info'
        );
        return redirect()->route('all.payments')->with($notification);
    }
    foreach ($pending_reservations as $reservation) {
        $payment = Payment::where('reservation_ref_no', $reservation->reference_no)
                            ->where('status', 'pending')
                            ->first();
        if ($payment) {
            $notification = array(
                'message' => 'A pending payment already exists for a pending reservation.', 
                'alert-type' => 'warning'
            );
            return redirect()->route('all.payments')->with($notification);
        }
    }

    

    return $next($request);
}
}
