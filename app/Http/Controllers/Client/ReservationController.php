<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\BookingDetails;
use App\Reservation;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function show(Request $request, Room $room)
    {
        //First check if room has reservation
        $check = $room->reservations()->whereDate('checkin', '<=', $request->checkin)
            ->whereDate('checkout', '>=', $request->checkout)->first();

        if(!is_null($check)) {
            exit("This room has been booked. Go to <a href='/rooms'>rooms</a> to see others");
        }else{
            return view('client.booking', compact('room'));
        }
    }

    public function store(Request $request, Room $room)
    {
        $reservation = DB::transaction(function () use ($room, $request) {
            //First check if room has reservation
            $reservation = $room->reservations()->create($request->only('total_price', 'guest_numbers', 'number_of_nights', 'checkin', 'checkout', 'user_id'));

            Mail::to(auth()->user()->email)->send(new BookingDetails($reservation));

            return $reservation;
        });

        return redirect("/confirmation/$room->id/$reservation->id?checkin=$request->checkin&checkout=$request->checkout&guests=$request->guest_numbers");
    }

    public function confirmation(Room $room, Reservation $reservation)
    {
        return view('client.confirmation', compact('room', $reservation));
    }

    public function viewRoom(Room $room)
    {
        return view("client.room", compact('room'));
    }
}
