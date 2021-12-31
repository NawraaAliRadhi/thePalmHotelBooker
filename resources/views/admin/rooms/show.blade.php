@extends("layouts.admin.main")
@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                        <span><i class="icon-calender"></i></span>
                        <span class="ml-1">{{ $room->name }}</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/rooms">Rooms</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{ $room->name }}</a></li>
                    </ol>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="project-info-box mt-0">
                            <h5>{{ $room->name }}</h5>
                            <p class="mb-0">{{ $room->details }}</p>
                        </div><!-- / project-info-box -->

                        <div class="project-info-box">
                            <p><b>Price /Day:</b> {{ $room->price_per_day }}</p>
                            <p><b>Price /Night:</b> {{ $room->price_per_night }}</p>
                            <p><b>Price /Week:</b> {{ $room->price_per_week }}</p>
                            <p></p>
                            <p><b>Floor No: </b>{{ $room->floor_number }}</p>
                            <p><b>Room/Bed Type: </b>{{ $room->room_types }} / {{ $room->bed_type }}</p>
                            <p><b>Smoking Type: </b>{{ $room->smoking_type }}</p>
                            <p class="mb-0"><b>Availability:</b>
                                @if ($room->is_room_available == 1)
                                    <span class="badge badge-primary">Yes</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif
                            </p>
                        </div><!-- / project-info-box -->
                    </div><!-- / column -->

                    <div class="col-md-7">
                        @if ($room->roomImages[0]['image_path'])
                            <img src="{{ \App\Helpers\Helper::getImageUrl($room->roomImages[0]['image_path']) }}" alt="project-image"
                                class="rounded" width="100%">
                        @endif
                        <div class="project-info-box">
                            <p><b>Amenities:</b>
                                <br>
                                @foreach ($room->room_amenities as $amenity)
                                    <i class="{{ $amenity->font }}"></i>
                                    <span>{{ $amenity->name }}</span>&nbsp;&nbsp;&nbsp;
                                @endforeach
                            </p>
                            <div style="display: flex;">
                                <a href="/admin/rooms/update/{{ $room->id }}" class="btn btn-primary"
                                    style="margin-bottom: 7px">Update</a>

                                <form method="POST" action="/admin/rooms/delete/{{ $room->id }}"
                                    onsubmit="return confirm('Do you really want to delete this room?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                </form>
                            </div>
                        </div><!-- / project-info-box -->
                    </div><!-- / column -->
                </div>
            </div>
        </div>
    </div>
@endsection
