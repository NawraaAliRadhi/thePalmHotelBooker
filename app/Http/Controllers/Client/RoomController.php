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
            $query->whereDate('checkin', '<=', $request->checkin)->whereDate('checkout', '>=', $request->checkout);
        })->paginate();

        $type = "reserve";

        return view("client.all", compact('rooms', 'type'));
    }
}
