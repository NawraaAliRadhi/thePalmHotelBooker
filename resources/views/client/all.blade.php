@extends("layouts.client.main")
@section("content")
<section class="breadcrumb-outer">
    <div class="container">
      <div class="breadcrumb-content">
        <h2>Room listing</h2>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              @if ($type === "room")
                Rooms
              @else
                Currently available rooms
              @endif
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>

  <section class="room-list">
    <div class="container">
      <div class="row">
        <div class="col-md-9 pull-right">
          <div class="list-results">
            <div class="list-results-sort pull-left pad-top-5">
              <p class="mar-0">Showing 1-5 of 80 results</p>
            </div>
            <div class="click-menu pull-right">
              <select class="selectpicker" data-width="120px" title="Sort By">
                <option data-icon="fa fa-long-arrow-alt-up" value="0">
                  Price
                </option>
                <option data-icon="fa fa-user" value="1">Name</option>
                <option data-icon="fa fa-star" value="1">Rating</option>
              </select>
              <div class="change-list f-active mar-right-10">
                <a href="roomlist-1.html"><i class="fa fa-bars"></i></a>
              </div>
            </div>
          </div>
          <div class="list-content">
            <div class="list-grid">

            @foreach ($rooms as $room)
            <div class="room-grid">
                <div class="grid-image">
                @php
                    $image = $room->roomImages()->first();
                @endphp
                @if (!is_null($image))
                    <img src="{{\App\Helpers\Helper::getImageUrl($image->image_path)}}" alt="{{$room->name}}" style="width: 100%; height: 300px">
                @else
                    <img src="/client/images/room1.jpg" alt="image">
                @endif
                </div>
                <div class="grid-content">
                  <div class="room-title">
                    <h4>{{$room->name}}</h4>
                    <p class="mar-top-5"><i class="fa fa-tag"></i>{{\App\Helpers\Helper::displayMoney($room->price_per_night)}}/Night</p>

                    <div class="deal-rating">

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
                  <div class="room-detail">
                    <p>
                        {!! \Illuminate\Support\Str::limit($room->details, 125, '...') !!}
                    </p>
                  </div>
                  <div class="room-services">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-bed" aria-hidden="true"></i> {{$room->bed_type}}
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-wifi" aria-hidden="true"></i> Quick
                        Service
                      </div>
                    </div>
                  </div>
                  <div class="grid-btn mar-top-20">

                    @if (isset($_GET['checkin']))
                    <a href="/room/<?= $room->id ?>?checkin={{strip_tags($_GET['checkin'])}}&checkout={{strip_tags($_GET['checkout'])}}&guests={{strip_tags($_GET['guests'])}}" class="btn btn-black mar-right-10"
                      >VIEW DETAILS</a>
                    @else
                    <a href="/room/{{$room->id}}" class="btn btn-black mar-right-10"
                    >VIEW DETAILS</a>
                    @endif

                    @if (auth()->check())
                    @if (isset($_GET['checkin']))
                        <a href="/book-room/<?= $room->id ?>?checkin={{strip_tags($_GET['checkin'])}}&checkout={{strip_tags($_GET['checkout'])}}&guests={{strip_tags($_GET['guests'])}}" class="btn btn-orange">BOOK NOW</a>
                    @else
                        <a href="/" class="btn btn-orange">BOOK NOW</a>
                    @endif
                    @else
                        <a href="/auth/login" class="btn btn-orange">LOGIN TO BOOK</a>
                    @endif
                  </div>
                </div>
              </div>

            @endforeach

            </div>
          </div>
          <div class="pagination-content text-center">
            {{$rooms->links()}}
          </div>
        </div>
        <div class="col-md-3 sidebar pull-left">
          <div class="list-sidebar">
            <div class="room-type list-sidebar-item">
              <h4>Room Types</h4>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Single Rooms</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Double Rooms</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Studio Rooms</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Kingsize Rooms</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Presidentsuite Rooms</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Murphy Rooms</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Connecting Rooms</label>
                </div>
              </div>
            </div>
            <div class="price list-sidebar-item">
              <h4>Price</h4>
              <div class="range-slider">
                <div
                  data-min="0"
                  data-max="2000"
                  data-unit="$"
                  data-min-name="min_price"
                  data-max-name="max_price"
                  class="
                    range-slider-ui
                    ui-slider
                    ui-slider-horizontal
                    ui-widget
                    ui-widget-content
                    ui-corner-all
                  "
                  aria-disabled="false"
                >
                  <span class="min-value">0 $</span>
                  <span class="max-value">2000 $</span>
                  <div
                    class="ui-slider-range ui-widget-header ui-corner-all full"
                    style="left: 0%; width: 100%;"
                  ></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="ratings list-sidebar-item">
              <h4>Ratings</h4>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>
                    <span class="rating">
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>
                    <span class="rating">
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>
                    <span class="rating">
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>
                    <span class="rating">
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>
                    <span class="rating">
                      <span class="fa fa-star"></span>
                    </span>
                  </label>
                </div>
              </div>
            </div>
            <div class="services list-sidebar-item">
              <h4>Services</h4>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>24/7 Reception</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Parking</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Bar</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Restaurant</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Satellite Television</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Lift/ELevator</label>
                </div>
              </div>
              <div class="pretty p-default p-thick p-pulse">
                <input type="checkbox" />
                <div class="state p-warning-o">
                  <label>Luggage Storage </label>
                </div>
              </div>
            </div>
            <div class="info-1 list-sidebar-item">
              <i class="fa fa-phone-volume"></i>
              <h5>Need help? Call us</h5>
              <a href="tel://004542344599" class="phone">+45 423 445 99</a>
              <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
