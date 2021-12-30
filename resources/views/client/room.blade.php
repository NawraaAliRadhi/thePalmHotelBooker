@extends("layouts.client.main")
@section("content")
      <section class="breadcrumb-outer">
         <div class="container">
            <div class="breadcrumb-content">
               <h2>{{$room->name}}</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{$room->name}}</li>
                  </ul>
               </nav>
            </div>
         </div>
      </section>
      <section class="details">
         <div class="container">
            <div class="detail-slider">
               <div class="slider-1 slider-for">

                @foreach ($room->roomImages as $image)
                <div class="detail-slider-item">
                    <img src="{{\App\Helpers\Helper::getImageUrl($image->image_path)}}" alt="{{$room->name}}">
                 </div>
                @endforeach

               </div>
               <div class="slider-1 slider-nav">

                @foreach ($room->roomImages as $img)
                  <div class="detail-slider-item">
                     <img src="{{\App\Helpers\Helper::getImageUrl($image->image_path)}}" alt="{{$room->name}}">
                  </div>
                @endforeach

               </div>
            </div>
            <div class="detail-content">
               <div class="detail-title">
                  <div class="title-left">
                     <h3>Luxury King Room</h3>
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
                     <ul>
                        <li class="facebook"><i class="fab fa-facebook"></i></li>
                        <li class="twitter"><i class="fab fa-twitter"></i></li>
                        <li class="linkedin"><i class="fab fa-linkedin"></i></li>
                        <li class="pinterest"><i class="fab fa-pinterest"></i></li>
                     </ul>
                     <div class="title-price">
                        <h3>{{\App\Helpers\Helper::displayMoney($room->price_per_night)}}<span>/Night</span></h3>
                     </div>
                  </div>
               </div>
               <div class="detail-overview">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="overview-outer">
                           <div class="overview-content mar-bottom-30">
                              <h4>Overview</h4>
                              <p>{{$room->details}}</p>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="check-in">
         <div class="container">
            <div class="form-content">
               {{-- <div class="table-item">
                  <div class="form-group">
                     <div class="date-range-inner-wrapper">
                        <input id="date-range2" class="form-control" value="Check In">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="table-item">
                  <div class="form-group">
                     <div class="date-range-inner-wrapper">
                        <input id="date-range3" class="form-control" value="Check In">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="table-item">
                  <div class="form-group form-icon">
                     <select>
                        <option value="0">Type</option>
                        <option value="1">0</option>
                        <option value="2">1</option>
                        <option value="3">2</option>
                        <option value="4">3</option>
                        <option value="5">4</option>
                     </select>
                  </div>
               </div>
               <div class="table-item">
                  <div class="form-group form-icon">
                     <select>
                        <option value="0">Destination</option>
                        <option value="1">0</option>
                        <option value="2">1</option>
                        <option value="3">2</option>
                        <option value="4">3</option>
                        <option value="5">4</option>
                     </select>
                  </div>
               </div> --}}

               <div class="table-item">
                  <div class="form-btn">

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
         </div>
      </section>

      <section class="amenities">
         <div class="container">
            <div class="section-title">
               <h3>Explore <span>Amenities</span></h3>
            </div>
            <div class="amenities-content">
               <div class="row">
                @foreach ($room->amenities as $a)
                <div class="col-lg-3 col-md-6">
                    <div class="amt-item mar-bottom-30">
                       <div class="amt-icon">
                          <i class="{{$a->amenity->font}}" aria-hidden="true"></i>
                       </div>
                       <h4>{{$a->amenity->name}}</h4>
                    </div>
                 </div>
                @endforeach
               </div>
            </div>
         </div>
      </section>

      <section class="detail-reviews">
         <div class="container">
            <div class="section-title">
               <h2>Explore <span>Reviews</span></h2>
            </div>
            <div class="review-outer">
               <ul>

                @foreach ($room->roomReviews as $review)
                <li>
                    <div class="review-item">
                       <div class="review-content">
                          <h5>{{$review->user->name}} gave this room a ({{$review->rating}}) star rating</h5>
                          <p class="date">{{$review->created_at->format('Y-m-d h:ia')}}</p>
                          <p>{{$review->review}}</p>
                       </div>
                    </div>
                 </li>
                @endforeach

               </ul>
            </div>
         </div>
      </section>
      @endsection
     
