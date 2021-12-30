<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\ApprovedMail;
use App\Reservation;
use App\Room;
use App\RoomImage;
use App\RoomReview;
use App\Traits\UploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $reservations = Reservation::paginate(Helper::defaultPaginate());
        return view("admin.reservations.list", compact("reservations"));
    }

    public function approve(Reservation $reservation)
    {
        $reservation->is_approved = 1;
        $reservation->save();

        //Send an email to the user telling them that their booking has been approved and they come at the lodge date
        Mail::to($reservation->user->email)->send(new ApprovedMail($reservation));

        return redirect()
        ->back()
        ->with("message", "Reservation has now been approved.");
    }

}
