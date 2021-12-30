@extends('layouts.client.main')
@section('content')
    <section class="breadcrumb-outer">
      <div class="container">
        <div class="breadcrumb-content">
          <h2>Reservation</h2>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Booking
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </section>

    <?php
    $checkin = new DateTime($_GET['checkin']);
    // echo $date->format('Y-m-d H:i:s');
    $checkout = new DateTime($_GET['checkout']);
    ?>

    <section class="content">
      <div class="container">
        <div class="reservation-links text-center">
          <h2 class="mar-bottom-60 text-capitalize">Make Your Reservation</h2>
          <div class="reservation-links-content">
            <div class="res-item">
              <a href="/" class="active"
                ><i class="fa fa-check"></i
              ></a>
              <p>Check Availability</p>
            </div>
            <div class="res-item">
              <a href="#" onclick="window.history.back()" class="active"
                ><i class="fa fa-check"></i
              ></a>
              <p>Select Room</p>
            </div>
            <div class="res-item">
              <a href="#" class="active">3</a>
              <p>Booking</p>
            </div>
            <div class="res-item">
                <a href="#">4</a>
                                        <p>Confirmation</p>
                                    </div>
          </div>
        </div>
        <div class="booking">
          <div class="row">
            <div class="col-lg-8">
              <div class="booking-content">
                <div class="booking-image">
                @php
                    $image = $room->roomImages()->first();
                @endphp
                @if (!is_null($image))
                    <img src="{{\App\Helpers\Helper::getImageUrl($image->image_path)}}" alt="{{$room->name}}">
                @else
                    <img src="/client/images/room1.jpg" alt="image">
                @endif
                  <div class="booking-title">
                    <div class="title-left">
                      <h3>{{$room->name}}</h3>
                      <div class="rating">
                        <?php
                        $rating = \App\Helpers\Helper::getAvgRating($room);
                        if ($rating != null) {
                            if($rating == 1) {
                                ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php
                            }elseif ($rating == 2) {
                                ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php
                            }elseif ($rating == 3) {
                                ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php
                            }elseif ($rating == 4) {
                                ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                <?php
                            }elseif ($rating == 5) {
                                ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                <?php
                            }
                        }
                      ?>
                      </div>
                    </div>
                    <div class="title-right pull-right">
                      <div class="title-price">
                        <h4 class="pad-top-15">
                          <a href="#">{{\App\Helpers\Helper::displayMoney($room->price_per_night)}}<span>/Night</span></a>
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="booking-desc mar-top-50">
                  {{-- <ul class="mar-bottom-15">
                    <li>
                      <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                    </li>
                    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
                    <li>
                      <i class="fa fa-tv" aria-hidden="true"></i> Telivision
                    </li>
                    <li>
                      <i class="fa fa-bath" aria-hidden="true"></i> Hot Water
                    </li>
                    <li>
                      <i class="fa fa-utensil-spoon" aria-hidden="true"></i>
                      Dinner
                    </li>
                    <li>
                      <i class="fa fa-cogs" aria-hidden="true"></i> Fast Service
                    </li>
                    <li>
                      <i class="fa fa-thermometer" aria-hidden="true"></i> AC
                    </li>
                    <li>
                      <i class="fa fa-car" aria-hidden="true"></i> Airport Taxi
                    </li>
                  </ul> --}}
                  <p>
                    {!! $room->details !!}
                  </p>
                </div>
                {{-- <div class="extra-services mar-top-50">
                  <h4 class="mar-bottom-30">Add Extra Services</h4>
                  <ul>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>10 Bedrooms</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>Wifi</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>Television</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>Hot Water</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>Dinner</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>Quick Services</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>A/C</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>Laundry Services</label>
                        </span>
                      </span>
                    </li>
                    <li>
                      <span
                        class="pretty p-default p-thick p-pulse mar-bottom-15"
                      >
                        <input type="checkbox" />
                        <span class="state p-warning-o">
                          <label>AirPort Taxi</label>
                        </span>
                      </span>
                    </li>
                  </ul>
                </div> --}}
                <div class="personal-info mar-top-50">
                  <div class="form-title">
                    <span>1</span>
                    <h4 class="mar-bottom-30">Personal Information</h4>
                  </div>
                  <form method="post" action="" id="form-id">

                    @csrf
                    <input type="hidden" name="checkin" value="{{strip_tags($_GET['checkin'])}}" />
                    <input type="hidden" name="checkout" value="{{strip_tags($_GET['checkout'])}}" />
                    <input type="hidden" name="number_of_nights" value="{{$checkout->diff($checkin)->format("%a")}}" />
                    <input type="hidden" name="guest_numbers" value="{{strip_tags($_GET['guests'])}}" />
                    <input type="hidden" name="total_price" value="{{strip_tags($room->price_per_night * $checkout->diff($checkin)->format("%a") + 80)}}" />
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" disabled value="{{auth()->user()->name}}" placeholder="First Name" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Number of nights</label>
                          <input type="text" disabled placeholder="Number of nights" value="{{$checkout->diff($checkin)->format("%a")}}" />
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
                <div class="card-info mar-top-50">
                  <div class="form-title">
                    <span>2</span>
                    <h4 class="mar-bottom-30">Payment Information</h4>
                  </div>
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Card Type" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Card Number" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Card Holder Name" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="CVC" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" placeholder="Expiry Month" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" placeholder="Expiry Year" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group radio-group">
                          <input type="radio" />Via Credit Card
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group radio-group">
                          <input type="radio" />Via Debit Card
                        </div>
                      </div>
                      <div class="col-md-12 mar-top-15">
                        <div class="form-group mar-bottom-30">
                          <input type="checkbox" /> I agree to the
                          <a href="#">Terms and Conditions</a>
                        </div>
                        <div class="card-btn">
                          <a href="#" class="btn btn-orange" onclick="document.getElementById('form-id').submit()">CONFIRM BOOKING</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="detail-sidebar">
                <div class="sidebar-reservation">
                  <h3>Your reservation</h3>
                  <div class="reservation-detail">
                    <div class="rd-top">
                      <div class="rd-box">
                        <label>Check in</label>
                        <p class="bold">{{$checkin->format('D')}}</p>
                        <p>{{$checkin->format('M, Y')}}<br />{{strftime("%A",strtotime($_GET['checkin']))}}</p>
                      </div>
                      <div class="rd-box">
                        <label>Check out</label>
                        <p class="bold">{{$checkout->format('D')}}</p>
                        <p>{{$checkout->format('M, Y')}}<br />{{strftime("%A",strtotime($_GET['checkout']))}}</p>
                      </div>
                    </div>
                    <div class="rd-top">
                      <div class="rd-box">
                        <p class="bold">{{$_GET['guests']}}</p>
                        <p>Guest</p>
                      </div>
                      <div class="rd-box">
                        <p class="bold">{{$checkout->diff($checkin)->format("%a")}}</p>
                        <p>Night</p>
                      </div>
                    </div>
                  </div>
                  <table class="reservation-table table">
                    <?php

                    $percent = $room->price_per_night * $checkout->diff($checkin)->format("%a");
                    $percent = $percent * 5 / 100;

                    ?>
                    <tbody>
                      <tr>
                        <td>1 Room x {{$checkout->diff($checkin)->format("%a")}} Night(s)</td>
                        <td>{{\App\Helpers\Helper::displayMoney($room->price_per_night * $checkout->diff($checkin)->format("%a"))}}</td>
                      </tr>
                      <tr>
                        <td>Tax</td>
                        <td>{{\App\Helpers\Helper::displayMoney($percent)}} (5%)</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>Total</td>
                        <td>{{\App\Helpers\Helper::displayMoney($room->price_per_night * $checkout->diff($checkin)->format("%a") + $percent)}}</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="sidebar-support">
                  <h3>Help and Support</h3>
                  <p>
                    You can contact us by calling the follwing
                    number
                  </p>
                  <p><i class="fa fa-phone"></i> 1777-8574 </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
