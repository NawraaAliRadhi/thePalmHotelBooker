<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\BookingDetails;
use App\Reservation;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function show(Request $request, Room $room)
    {
        //First check if room has reservation
        
        $rooms = Room::query();
        $rooms = $rooms->whereHas("reservations", function ($query) use ($request) {
            //$query->whereDate('checkin', '<=', $request->checkin)->whereDate('checkout', '>=', $request->checkout);
            $query->where(function($query) use ($request){
                $query->where('checkin', '<=' , $request->checkin);
                $query->where('checkout', '>=', $request->checkin);
            })->orWhere(function($query)use($request){
                $query->where('checkin', '<=' , $request->checkout);
                $query->where('checkout', '>=', $request->checkout);
            });
        })->where('id', $room->id);
        
        if($rooms->count() > 0) {
            exit("This room has been booked. Go to <a href='/rooms'>rooms</a> to see others");
        }else{
            return view('client.booking', compact('room'));
        }
    }

    public function store(Request $request, Room $room)
    {
        $this->validate($request, [

        ]);
        $totalChargeWithoutTax = $room->price_per_night * Carbon::parse($request->get('checkin'))->diffInDays(Carbon::parse($request->get('checkout')));
        $totalTax = $totalChargeWithoutTax * (config('setting.tax') / 100);
        $request['total_price'] = $totalChargeWithoutTax + $totalTax;

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
