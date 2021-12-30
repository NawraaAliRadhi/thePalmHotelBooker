<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Navigation</li>
            <li><a href="/admin/dashboard"><i class="mdi mdi-home"></i><span class="nav-text">Home</span></a></li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-door"></i><span class="nav-text">Rooms</span></a>
                <ul aria-expanded="false">
                    <li><a href="/admin/rooms">All Rooms</a></li>
                    <li><a href="/admin/rooms/create">Create Room</a></li>
                    {{-- <li><a href="#">Available Rooms</a></li>
                    <li><a href="#">Unavailable Rooms</a></li> --}}
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-door-open"></i><span class="nav-text">Reservations</span></a>
                <ul aria-expanded="false">
                    <li><a href="/admin/reservations">All Reservations</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-door"></i><span class="nav-text">Reports</span></a>
                <ul aria-expanded="false">
                    <li><a href="/admin/reports/reservations">Reservation Reports</a></li>
                    <li><a href="/admin/reports/users">User Reports</a></li>
                    <li><a href="#">Payment Reports</a></li>
                    <li><a href="/admin/reports/rooms">Room Reports</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
