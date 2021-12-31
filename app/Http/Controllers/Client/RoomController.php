<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function rooms(Request $request)
    {
        $rooms = Room::paginate(3);
        $type = "room";

        return view("client.all", compact('rooms', 'type'));
    }

    public function reserve(Request $request)
    {
        $rooms = Room::query();
        $rooms = $rooms->whereDoesntHave("reservations", function ($query) use ($request) {
            //$query->whereDate('checkin', '<=', $request->checkin)->whereDate('checkout', '>=', $request->checkout);
            $query->where(function($query) use ($request){
                $query->where('checkin', '<=' , $request->checkin);
                $query->where('checkout', '>=', $request->checkin);
            })->orWhere(function($query)use($request){
                $query->where('checkin', '<=' , $request->checkout);
                $query->where('checkout', '>=', $request->checkout);
            });
        })->paginate();

        $type = "reserve";

        return view("client.all", compact('rooms', 'type'));
    }
}
