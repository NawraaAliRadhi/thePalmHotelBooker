<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\BookingDetails;
use App\Reservation;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = auth()->user()->reservations()->whereNull('cancelled_at')->get();
        $active = "dashboard";
        return view("client.dashboard.dashboard", compact('reservations', 'active'));
    }

    public function editProfile()
    {
        $active = "profile";
        return view("client.dashboard.profile", compact('active'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required|unique:users,email,".auth()->user()->id,
            "phone" => "required|unique:users,phone,".auth()->user()->id,
            "address" => "required",
            "notes" => "required"
        ]);

        User::where('id', auth()->user()->id)->update($request->only("name", "email", "phone", "address", "notes"));

        return redirect()
            ->back()
            ->with("message", "Profile updated successfully.");
    }

    public function cancelReservation($id)
    {
        $reservation = auth()->user()->reservations()->where('id', $id)->first();
        $reservation->cancelled_at = now();
        $reservation->update();
        return redirect()->back()->with('message', 'If this was your reservation, its been deleted successfully.');
    }

    public function reviewRoom(Room $room)
    {
        $active = "review";
        $review = $room->roomReviews()->where(['user_id' => auth()->user()->id])->first();
        return view("client.dashboard.add-review", compact('room', 'active', 'review'));
    }

    public function saveReview(Room $room, Request $request)
    {
        $this->validate($request, [
            "review" => "required",
            "rating" => "required|numeric"
        ]);

        $review = $room->roomReviews()->create([
            'review' => $request->review,
            'rating' => $request->rating,
            'room_id' => $room->id,
            'user_id' => auth()->user()->id
        ]);

        $active = "review";
        return redirect()->back()->with("message", "Review added successfully")->with("review", $review)->with("active", $active);
    }

    public function reviews()
    {
        $reviews = auth()->user()->reviews;
        $active = "review";
        return view("client.dashboard.reviews", compact("reviews", "active"));
    }
}