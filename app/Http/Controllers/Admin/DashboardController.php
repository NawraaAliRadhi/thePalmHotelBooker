<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use App\Room;
use App\RoomReview;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $room_count = Room::count();
        $user_count = User::where('role_as', 0)->count();
        $reservation_count = Reservation::count();
        $review_count = RoomReview::count();
        return view('admin.dashboard', compact('room_count', 'user_count', 'reservation_count', 'review_count'));
    }

    public function reservationReports(Request $request)
    {
        $reservations = Reservation::orderBy('id', 'desc')->get();
        return view("admin.reservations.reports", compact("reservations"));
    }

    public function userReports(Request $request)
    {
        $users = User::orderBy('id', 'desc')->get();
        return view("admin.users", compact("users"));
    }

    public function roomReports(Request $request)
    {
        $rooms = Room::orderBy('id', 'desc')->get();
        return view("admin.rooms.reports", compact("rooms"));
    }
}