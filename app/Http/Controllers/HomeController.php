<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Room::paginate(3);
        return view("client.home", compact('rooms'));
    }
}
