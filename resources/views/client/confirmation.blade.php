@extends("layouts.client.main") @section("content")
<section class="breadcrumb-outer">
  <div class="container">
    <div class="breadcrumb-content">
      <h2>Reservation</h2>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Booking</li>
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
          <a href="/rooms" class="active"
            ><i class="fa fa-check"></i
          ></a>
          <p>Select Room</p>
        </div>
        <div class="res-item">
          <a href="#" class="active"><i class="fa fa-check"></i></a>
          <p>Booking</p>
        </div>
        <div class="res-item">
          <a href="#" class="active">4</a>
          <p>Confirmation</p>
        </div>
      </div>
    </div>
    <div class="success-notify">
      <div class="success-icon">
        <i class="fa fa-check"></i>
      </div>
      <div class="success-content">
        <h4 class="white mar-bottom-5">Payment Confirmed</h4>
        <p class="white mar-0">
          Thank you, your payment has been successful and your booking is now
          confirmed. We'll email you at
          <a
            href="#"
            >{{auth()->user()->email}}</a
          >

          When the admin has approved your booking.
        </p>
      </div>
      <div class="cancel-icon">
        <i class="fa fa-times"></i>
      </div>
    </div>
    <div class="confirmation booking-content mar-top-60">
      <div class="row">
        <div class="col-lg-8">
          <div class="confirmation-content">
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
                  <tbody>
                    <tr>
                      <td>1 Room x {{$checkout->diff($checkin)->format("%a")}} Night(s)</td>
                      <td>{{\App\Helpers\Helper::displayMoney($room->price_per_night * $checkout->diff($checkin)->format("%a"))}}</td>
                    </tr>
                    <tr>
                      <td>Tax</td>
                      <td>BD80</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>Total</td>
                      <td>{{\App\Helpers\Helper::displayMoney($room->price_per_night * $checkout->diff($checkin)->format("%a") + 80)}}</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="sidebar-support">
                <h3>Help and Support</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Vivamus ut arnare
                </p>
                <p><i class="fa fa-phone"></i> 977 - 222 - 444 - 666</p>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection
