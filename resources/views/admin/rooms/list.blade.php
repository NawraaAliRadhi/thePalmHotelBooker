@extends("layouts.admin.main")
@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                        <span><i class="icon-calender"></i></span>
                        <span class="ml-1">Rooms</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/rooms">Rooms</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All room</h4>
                        </div>
                        <div class="card-body">

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Room Id #</th>
                                            <th>Name</th>
                                            <th>Availability</th>
                                            <th>Price per day</th>
                                            {{-- <th>Price per night</th>
                                                <th>Price per week</th> --}}
                                            <th>Floor number</th>
                                            <th>Date created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <th>{{ $room->id }}</th>
                                                <td>{{ $room->name }}</td>

                                                <td>
                                                    @if ($room->is_room_available == 1)
                                                        <span class="badge badge-primary">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>

                                                <td class="color-primary">
                                                    <b>{{ \App\Helpers\Helper::displayMoney($room->price_per_night) }}</b>
                                                </td>
                                                {{-- <td class="color-secondary">{{\App\Helpers\Helper::displayMoney($room->price_per_night)}}</td>
                                                <td class="color-secondary">{{\App\Helpers\Helper::displayMoney($room->price_per_week)}}</td> --}}
                                                <td>{{ $room->floor_number }} Floor</td>
                                                <td>{{ $room->created_at->format('d, M Y') }}</td>
                                                <td>
                                                    <a href="/admin/rooms/show/{{ $room->id }}" class="btn btn-info"
                                                        style="margin-bottom: 7px">Show</a>
                                                    <a href="/admin/rooms/update/{{ $room->id }}"
                                                        class="btn btn-primary" style="margin-bottom: 7px">Update</a>

                                                    <form method="POST" action="/admin/rooms/delete/{{ $room->id }}"
                                                        onsubmit="return confirm('Do you really want to delete this room?');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <center>{{ $rooms->links() }}</center>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
