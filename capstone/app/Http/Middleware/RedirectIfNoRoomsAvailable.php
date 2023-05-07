<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;

class RedirectIfNoRoomsAvailable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next) {
    //     $rooms = Room::where('status', 1)->get();
    //     $roomIds = $rooms->pluck('id')->toArray();
    //     $reservations = Reservation::whereIn('room_id', $roomIds)->whereIn('status',['pending','confirmed'])->get();
    //     if ($rooms->count() == 0) {
            
    //         $notification = [
    //             'message' => 'No rooms available for reservation.',
    //             'alert-type' => 'info'
    //         ];
    //         return redirect()->route('all.reservations')->with($notification);
    //     }
    //     if ($reservations->count() > 0) {
    //         $notification = [
    //             'message' => 'One or more rooms are currently reserved.',
    //             'alert-type' => 'info'
    //         ];
    //         return redirect()->route('all.reservations')->with($notification);
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next) {
        $rooms = Room::where('status', 1)->get();
        $roomIds = $rooms->pluck('id')->toArray();
        $reservations = Reservation::whereIn('room_id', $roomIds)->whereIn('status', ['pending', 'confirmed'])->get();
    
        // Get the IDs of rooms with no reservations
        $unreservedRoomIds = array_diff($roomIds, $reservations->pluck('room_id')->toArray());
    
        if (count($unreservedRoomIds) === 0) {
            // If all rooms are reserved, redirect with an info message
            $notification = [
                'message' => 'All rooms are currently reserved.',
                'alert-type' => 'info'
            ];
            return redirect()->route('all.reservations')->with($notification);
        } else {
            // Otherwise, let the request continue
            return $next($request);
        }
    }
}
