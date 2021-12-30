@extends("layouts.admin.main")

@section("custom_css")
<link rel="stylesheet" href="/system/vendor/bootstrap-daterangepicker/daterangepicker.css">
@endsection

@section("content")
<div class="content-body">
    <!-- row -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card" id="user-activity">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#user" role="tab" aria-controls="" aria-selected="true">
                                <div class="icon-wrap primary">
                                    <i class="mdi mdi-account-group"></i>
                                </div>
                                <h4>{{$user_count}}</h4>
                                <span class="type-name">User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#session" role="tab" aria-controls="" aria-selected="false">
                                <div class="icon-wrap success">
                                    <i class="mdi mdi-airballoon"></i>
                                </div>
                                <h4>{{$reservation_count}}</h4>
                                <span class="type-name">Reservations</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#bounce" role="tab" aria-controls="" aria-selected="false">
                                <div class="icon-wrap info">
                                    <i class="mdi mdi-trophy"></i>
                                </div>
                                <h4>{{$room_count}}</h4>
                                <span class="type-name">Rooms</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab" aria-controls="" aria-selected="false">
                                <div class="icon-wrap danger">
                                    <i class="mdi mdi-clock"></i>
                                </div>
                                <h4>{{$review_count}}</h4>
                                <span class="type-name">Reviews</span>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <h4 class="card-title pt-2">User Activity</h4>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="home-tab">
                                <canvas id="activity" class="chartjs"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Active Now</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="active_now"></canvas>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User acquisition</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="user_acq"></canvas>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sessions by Country</h4>
                    </div>
                    <div class="card-body">
                        <div id="world-map"></div>
                        <div class="row">
                            <div class="col-xl-6">
                                <canvas id="chart_equity_return"></canvas>
                            </div>
                            <div class="col-xl-6">
                                <canvas id="chart_equity_return2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Session by device</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="session_device"></canvas>
                        <div class="row no-gutters justify-content-center mt-4">
                            <div class="col-4 col-lg-3">
                                <div class="card card-icon-info text-center border-0 box-shadow-none">
                                    <i class="mdi mdi-desktop-mac fa-2x"></i>
                                    <p class="mb-2">Desktop</p>
                                    <h4 class="text-dark pb-0">89.6%</h4>
                                    <span class="text-danger">5.9% <i class="mdi mdi-arrow-down-bold"></i></span>
                                </div>
                            </div>
                            <div class="col-4 col-lg-3">
                                <div class="card card-icon-info text-center border-0 box-shadow-none">
                                    <i class="mdi mdi-cellphone-android fa-2x"></i>
                                    <p class="mb-2">Mobile</p>
                                    <h4 class="text-dark pb-0">9.8%</h4>
                                    <span class="text-success">6.9% <i class="mdi mdi-arrow-up-bold"></i></span>
                                </div>
                            </div>
                            <div class="col-4 col-lg-3">
                                <div class="card card-icon-info text-center border-0 box-shadow-none">
                                    <i class="mdi mdi-tablet-ipad fa-2x"></i>
                                    <p class="mb-2">Tablet</p>
                                    <h4 class="text-dark pb-0">0.9%</h4>
                                    <span class="text-danger">1.5% <i class="mdi mdi-arrow-down-bold"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Page Views</h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="page-view-table">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                    <th>Page</th>
                                    <th>Page Views</th>
                                    <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="analytics.html">/analytics.html</a></td>
                                    <td>521</td>
                                    <td>$0.00</td>
                                    </tr>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="email-inbox.html">/email-inbox.html</a></td>
                                    <td>356</td>
                                    <td>$0.00</td>
                                    </tr>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="email-compose.html">/email-compose.html</a></td>
                                    <td>254</td>
                                    <td>$0.00</td>
                                    </tr>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="charts-chartjs.html">/charts-chartjs.html</a></td>
                                    <td>126</td>
                                    <td>$0.00</td>
                                    </tr>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="profile.html">/profile.html</a></td>
                                    <td>50</td>
                                    <td>$0.00</td>
                                    </tr>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="general-widgets.html">/general-widgets.html</a></td>
                                    <td>50</td>
                                    <td>$0.00</td>
                                    </tr>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="card.html">/card.html</a></td>
                                    <td>590</td>
                                    <td>$0.00</td>
                                    </tr>
                                    <tr>
                                    <td class="text-primary"><a class="link" href="email-inbox.html">/email-inbox.html</a></td>
                                    <td>29</td>
                                    <td>$0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Trending over time</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="trending_over_time"></canvas>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Keywords</h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="session-duration">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Keyword</th>
                                        <th>Click</th>
                                        <th>Impressions</th>
                                        <th>Position</th>
                                        <th>CTR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bootstrap</td>
                                        <td>20,147</td>
                                        <td>45,325</td>
                                        <td>9.70</td>
                                        <td>78.3%</td>
                                    </tr>
                                    <tr>
                                        <td>Admin</td>
                                        <td>20,147</td>
                                        <td>45,325</td>
                                        <td>9.70</td>
                                        <td>78.3%</td>
                                    </tr>
                                    <tr>
                                        <td>Dashboard</td>
                                        <td>20,147</td>
                                        <td>45,325</td>
                                        <td>9.70</td>
                                        <td>78.3%</td>
                                    </tr>
                                    <tr>
                                        <td>Free template</td>
                                        <td>20,147</td>
                                        <td>45,325</td>
                                        <td>9.70</td>
                                        <td>78.3%</td>
                                    </tr>
                                    <tr>
                                        <td>Responsive</td>
                                        <td>10,547</td>
                                        <td>25,245</td>
                                        <td>2.70</td>
                                        <td>98.3%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="date_picker">
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="more-link">
                            <a href="#">Audience Overview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("custom_scripts")
    <!-- Daterange picker library -->
    <script src="/system/vendor/moment/moment.min.js"></script>
    <script src="/system/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>


    <!-- Vectormap -->
    <script src="/system/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="/system/vendor/jqvmap/js/jquery.vmap.world.js"></script>


    <!-- daterangepicker init -->
    <!-- <script src="./js/plugins-init/card-headerdatepicker-init.js"></script> -->


    <script src="/system/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/system/js/dashboard/dashboard-1.js"></script>
@endsection
