@extends("layouts.admin.main")
@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                        <span><i class="icon-calender"></i></span>
                        <span class="ml-1">Reservation</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/reservations">Reservations</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All reservations</h4>
                        </div>
                        <div class="card-body">

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-responsive-sm" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>Room name #</th>
                                            <th>Client name</th>
                                            <th>Total price</th>
                                            <th>Number of guest</th>
                                            {{-- <th>Price per night</th> --}}
                                            <th>Cancellation Price</th>
                                            <th>Is Approved</th>
                                            <th>Checked In - Checked Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $reservation)
                                            <tr>
                                                <th>{{ $reservation->room->name }}</th>
                                                <td>{{ $reservation->user->name }}</td>
                                                <td class="color-primary">
                                                    <b>{{ \App\Helpers\Helper::displayMoney($reservation->total_price) }}</b>
                                                </td>
                                                <td>{{ $reservation->guest_numbers }}</td>
                                                <td>BD{{ $reservation->cancellation_price }}</td>
                                                <td>
                                                    @if ($reservation->is_approved == 1)
                                                        <span class="badge badge-primary">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td><b>{{ date('Y-m-d', strtotime($reservation->checkin)) }} -
                                                        {{ date('Y-m-d', strtotime($reservation->checkout)) }}</b></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
