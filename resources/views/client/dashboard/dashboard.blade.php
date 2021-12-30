@extends("client.dashboard.layouts.main")

@section('content')
    <div class="dashboard-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 traffic">
                <div class="dashboard-list-box">
                    <h4 class="gray">Recent Bookings</h4>
                    <div class="table-box">
                        <table class="basic-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Room</th>
                                    <th>Check-In - Check-Out</th>
                                    <th>No of guest(s)</th>
                                    <th>Price</th>
                                    <th>Is Approved?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->created_at }}</td>
                                        <td class="t-id">{{ $reservation->room->name }}</td>
                                        <td><b>{{ date('Y-m-d', strtotime($reservation->checkin)) }} -
                                                {{ date('Y-m-d', strtotime($reservation->checkout)) }}</b></td>
                                        <td>{{ $reservation->guest_numbers }}</td>
                                        <td>{{ \App\Helpers\Helper::displayMoney($reservation->total_price) }}</td>
                                        <td>
                                            @if ($reservation->is_approved == 1)
                                                <span class="badge badge-primary">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (\Illuminate\Support\Carbon::now()->startOfDay()->gte($reservation->checkin) == false)
                                                <a
                                                    onClick="bookingCancellation(event, '/dashboard/booking/cancel/{{ $reservation->id }}')">Cancel
                                                    Reservation</a>
                                            @else
                                                <b>You can't cancel this reservation</b>
                                            @endif

                                            <br />
                                            <a class="btn btn-primary"
                                                href="/dashboard/add-review/{{ $reservation->room->id }}">Add a review</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script>
        window.bookingCancellation = function(e, cancellationUrl) {
            e.preventDefault();
            var confirmation = window.confirm(
                "Are you sure want to cancel the booking? The Cancellation charges may apply.")

            if (confirmation) {
                location.href = cancellationUrl
            }
        }
    </script>
@endsection
