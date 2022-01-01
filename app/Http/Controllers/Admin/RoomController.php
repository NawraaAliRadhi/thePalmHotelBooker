<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Room;
use App\RoomAmenity;
use App\RoomImage;
use App\RoomReview;
use App\Traits\UploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $rooms = Room::paginate(Helper::defaultPaginate());
        return view("admin.rooms.list", compact("rooms"));
    }

    public function create()
    {
        return view("admin.rooms.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:rooms,name",
            "details" => "required",
            "price_per_day" => "required",
            "floor_number" => "required",
            "room_types" => "required",
            "bed_type" => "required",
            "smoking_type" => "required",
            "is_room_available" => "required|in:1,0",
            "images*" => "required|mimes:jpg,jpeg,png,bmp|max:2000",
        ]);

        try {
            return DB::transaction(function () use ($request) {
                //Visit https://laravel.com/docs/8.x/database#database-transactions
                $room = new Room();
                $room->name = $request->name;
                $room->details = $request->details;
                $room->floor_number = $request->floor_number;
                $room->room_types = $request->room_types;
                $room->is_room_available = $request->is_room_available;
                $room->price_per_day = $request->price_per_day;
                $room->price_per_night = $request->price_per_night;
                $room->price_per_week = $request->price_per_week;
                $room->bed_type = $request->bed_type;
                $room->smoking_type = $request->smoking_type;
                $room->save();

                if ($request->amenities != null) {
                    foreach ($request->amenities as $a) {
                        RoomAmenity::create(["room_id" => $room->id, "amenity_id" => $a]);
                    }
                }

                //Process image uploads
                //Str takes care of security when uploading images, using a hash map (md5)
                foreach ($request->file("images") as $image) {
                    $name = Str::slug($room->name) . "_" . md5(rand(3, 33333));
                    $folder = "/uploads/rooms/";
                    $filePath =
                        $folder .
                        $name .
                        "." .
                        $image->getClientOriginalExtension();
                    $this->uploadOne($image, $folder, "public", $name);

                    $room->roomImages()->create(["image_path" => $filePath]);
                }

                return redirect()
                    ->back()
                    ->with("message", "Room added successfully.");
            });
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->with("error_message", $exception->getMessage());
        }
    }

    public function edit(Room $room)
    {
       // return $room->roomImages;
        return view("admin.rooms.edit")->with("room", $room);
    }

    public function show(Request $request, Room $room)
    {
        // $room = Room::with('amenities')->find($room->id);
        // return $room;
        return view('admin.rooms.show', compact('room'));
    }

    public function update(Room $room, Request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:rooms,name,".$room->id,
            "details" => "required",
            "price_per_day" => "required",
            "floor_number" => "required",
            "room_types" => "required",
            "bed_type" => "required",
            "smoking_type" => "required",
            "is_room_available" => "required|in:1,0",
            "images*" => "nullable|mimes:jpg,jpeg,png,bmp|max:2000",
        ]);

        try {
            return DB::transaction(function () use ($room, $request) {
                //Visit https://laravel.com/docs/8.x/database#database-transactions
                $room->name = $request->name;
                $room->details = $request->details;
                $room->floor_number = $request->floor_number;
                $room->room_types = $request->room_types;
                $room->is_room_available = $request->is_room_available;
                $room->price_per_day = $request->price_per_day;
                $room->price_per_night = $request->price_per_night;
                $room->price_per_week = $request->price_per_week;
                $room->bed_type = $request->bed_type;
                $room->smoking_type = $request->smoking_type;
                $room->save();

                $room->amenities()->delete();

                if ($request->amenities != null) {
                    foreach ($request->amenities as $a) {
                        RoomAmenity::create(["room_id" => $room->id, "amenity_id" => $a]);
                    }
                }

                if (!is_null($request->images)) {
                    //Process image uploads
                    //Str takes care of security when uploading images, using a hash map (md5)
                    foreach ($request->file("images") as $image) {
                        $name =
                            Str::slug($room->name) . "_" . md5(rand(3, 33333));
                        $folder = "/uploads/rooms/";
                        $filePath =
                            $folder .
                            $name .
                            "." .
                            $image->getClientOriginalExtension();
                        $this->uploadOne($image, $folder, "public", $name);

                        $room
                            ->roomImages()
                            ->create(["image_path" => $filePath]);
                    }
                }

                return redirect()
                    ->back()
                    ->with("message", "Updated successfully.");
            });
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->with("error_message", $exception->getMessage());
        }
    }

    public function delete(Room $room)
    {
        //Delete images
        foreach ($room->roomImages as $image) {
            $this->deleteFile($image->image_path);
            $image->delete();
        }
        $room->roomReviews()->delete();
        $room->reservations()->delete();

        /**
         * To delte many to many associations, we use detach instead of delete() method
         * @see https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
         */
        $room->room_amenities()->detach();
        $room->delete();

        return redirect()
            ->back()
            ->with("message", "Room was deleted successfully.");
    }

    public function deleteImage(RoomImage $roomImage)
    {
        //Delete image
        $this->deleteFile($roomImage->image_path);
        $roomImage->delete();

        return redirect()
            ->back()
            ->with("message", "Image was deleted successfully.");
    }
}