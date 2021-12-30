@extends("layouts.client.main")
@section("content")
<section class="banner banner-style-1">
    <div class="slider">
       <div class="swiper-container">
          <div class="swiper-wrapper">
             <div class="swiper-slide" style="background-image:url(/client/images/slider/slider3.jpg)">
                <div class="swiper-content">
                   <h1 data-animation="animated fadeInUp">Explore & Enjoy With<span> The Palm Hotel</span></h1>
                   <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or mar-right-10"><i class="fa fa-book"></i> Explore Our Rooms</a>
                   <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-wt"><i class="fa fa-book"></i> Book A Room Now</a>
                </div>
             </div>
             <div class="swiper-slide" style="background-image:url(/client/images/slider/slider2.jpg)">
                <div class="swiper-content">
                   <h1 data-animation="animated fadeInUp"><span>Spend Holidays</span> With The Palm Hotel</h1>
                   <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or mar-right-10"><i class="fa fa-book"></i> Explore Our Rooms</a>
                </div>
             </div>
             <div class="swiper-slide" style="background-image:url(/client/images/slider/slider1.jpg)">
                <div class="swiper-content">
                   <h1 data-animation="animated fadeInUp">Enjoy The World of <span>Relaxation</span></h1>
                   <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or mar-right-10"><i class="fa fa-book"></i> Explore Our Rooms</a>
                </div>
             </div>
          </div>
          <div class="swiper-pagination"></div>
       </div>
       <div class="overlay"></div>
    </div>
    <div class="banner-form form-style-2">
       <div class="form-content">
          <div class="form-title">
             <h4 class="mar-0">Reserve Your Room</h4>
          </div>
        <form action="/reserve" id="form-id">
          <div class="form-content-inner">
             <div class="table-item">
                <label>Check In</label>
                <div class="form-group">
                   <div class="">
                      <input type="date" class="form-control" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" name="checkin">
                   </div>
                </div>
             </div>
             <div class="table-item">
                <label>Check Out</label>
                <div class="form-group">
                   <div class="">
                      <input type="date" class="form-control" value="{{date('Y-m-d', strtotime('tomorrow'))}}" min="{{date('Y-m-d')}}" name="checkout">
                   </div>
                </div>
             </div>
             <div class="table-item">
                <label>Guests</label>
                <div class="form-group form-icon">
                   <select name="guests">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                   </select>
                </div>
             </div>
             <div class="table-item">
                <div class="form-btn">
                    <a class="btn btn-orange" onclick="document.getElementById('form-id').submit()">Book Now</a>
                </div>
             </div>
          </div>
        </form>
       </div>
    </div>
 </section>
 <section class="about-us">
    <div class="container">
       <div class="section-title">
          <h2>About <span>Us</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
       </div>
       <div class="about-outer">
          <div class="row">
             <div class="col-lg-6">
                <div class="about-content">
                   <h3 class="mar-bottom-30">Finest and Luxurious Hotel in the Town</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius iaculis gravida. Nunc vel maximus libero. Quisque ligula nisi, hendrerit et scelerisque et, scelerisque vitae magna. Integer sollicitudin, ex auctor iaculis tempor, mauris odio accumsan odio.</p>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius iaculis gravida. Nunc vel maximus libero. Quisque ligula nisi, hendrerit et scelerisque et, scelerisque vitae magna. Integer sollicitudin, ex auctor iaculis tempor, mauris odio accumsan odio.</p>
                   <a class="btn btn-orange mar-top-10">KNOW MORE ABOUT US <i class="fas fa-angle-double-right"></i></a>
                </div>
             </div>
             <div class="col-lg-6">
                <div class="about-image">
                   <div class="image-box">
                      <div class="image-1 abt-image">
                         <img src="/client/images/about1.jpg" alt="image">
                      </div>
                      <div class="image-2 abt-image">
                         <img src="/client/images/about2.jpg" alt="image">
                      </div>
                   </div>
                   <div class="image-box">
                      <div class="image-3 abt-image">
                         <img src="/client/images/about3.jpg" alt="image">
                      </div>
                      <div class="image-4 abt-image">
                         <img src="/client/images/about4.jpg" alt="image">
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="rooms">
    <div class="container">
       <div class="section-title">
          <h2>Explore <span>Rooms</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
       </div>
       <div class="room-outer">
          <div class="row">

            @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-6 mar-bottom-30">
                <div class="room-item">
                   <div class="room-image">
                        @php
                            $image = $room->roomImages()->first();
                        @endphp
                        @if (!is_null($image))
                            <img src="{{\App\Helpers\Helper::getImageUrl($image->image_path)}}" alt="{{$room->name}}" height="300">
                        @else
                            <img src="/client/images/room1.jpg" alt="image" height="300">
                        @endif
                   </div>
                   <div class="room-content">
                      <div class="room-title">
                         <h4>{{$room->name}}</h4>
                         <p>{{\App\Helpers\Helper::displayMoney($room->price_per_night)}}/Night</p>
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
                      <div class="room-services mar-bottom-15">
                         <ul>
                            <li><i class="fa fa-bed" aria-hidden="true"></i> {{$room->bed_type}}</li>
                            <li><i class="fa fa-category" aria-hidden="true"></i> {{$room->room_types}}</li>
                         </ul>
                      </div>
                      <p>{!! \Illuminate\Support\Str::limit($room->details, 125, '...') !!}</p>
                      <div class="room-btns mar-top-20">
                         <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>

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
            @endforeach

          </div>
       </div>
       <div class="section-btn pad-0">
          <a href="/rooms" class="btn btn-black">EXPLORE ALL ROOMS <i class="fas fa-angle-double-right"></i></a>
       </div>
    </div>
 </section>
 <section class="call-to-action call-to-action-new">
    <div class="container">
       <div class="call-content text-center">
          <div class="call-button">
             <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo"><i class="fa fa-play"></i></button>
          </div>
          <div class="video-figure"></div>
          <h2 class="white mar-top-25 mar-bottom-0">virtual Tour of a brand <br><span>Hotux</span> hotel</h2>
       </div>
    </div>
 </section>
 <section class="services pad-bottom-70">
    <div class="container">
       <div class="section-title">
          <h2>Explore <span>Services</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
       </div>
       <div class="service-outer">
          <div class="row">
             <div class="col-lg-4 col-md-6 mar-bottom-30">
                <div class="service-item">
                   <div class="service-image">
                      <img src="/client/images/service1.jpg" alt="Image">
                   </div>
                   <div class="service-content">
                      <h4><a href="service-detail.html">Restaurant</a></h4>
                      <p>Breakfast and Dinner</p>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mar-bottom-30">
                <div class="service-item">
                   <div class="service-image">
                      <img src="/client/images/service2.jpg" alt="Image">
                   </div>
                   <div class="service-content">
                      <h4><a href="service-detail.html">Massage</a></h4>
                      <p>Opens Daily</p>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mar-bottom-30">
                <div class="service-item">
                   <div class="service-image">
                      <img src="/client/images/service3.jpg" alt="Image">
                   </div>
                   <div class="service-content">
                      <h4><a href="service-detail.html">Conference Room</a></h4>
                      <p>Air Conditioning</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="reviews">
    <div class="container">
       <div class="section-title title-white">
          <h2>Explore <span>Reviews</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
       </div>
       <div class="review-slider">
          <div class="slider-item">
             <div class="slider-image">
                <img src="/client/images/review1.jpg" alt="image">
             </div>
             <div class="slider-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod tortor vitae nisi pharetra egestas. Sed egestas sapien libero.</p>
                <h4>Micheal Clordy</h4>
                <span>Germany</span>
             </div>
             <div class="slider-quote">
                <img src="/client/images/icons/quote.png" alt="Image">
             </div>
          </div>
          <div class="slider-item">
             <div class="slider-image">
                <img src="/client/images/review2.jpg" alt="image">
             </div>
             <div class="slider-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod tortor vitae nisi pharetra egestas. Sed egestas sapien libero.</p>
                <h4>Ketty Perry</h4>
                <span>Australia</span>
             </div>
             <div class="slider-quote">
                <img src="/client/images/icons/quote.png" alt="Image">
             </div>
          </div>
          <div class="slider-item">
             <div class="slider-image">
                <img src="/client/images/review1.jpg" alt="image">
             </div>
             <div class="slider-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod tortor vitae nisi pharetra egestas. Sed egestas sapien libero.</p>
                <h4>Micheal Clordy</h4>
                <span>Germany</span>
             </div>
             <div class="slider-quote">
                <img src="/client/images/icons/quote.png" alt="Image">
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="news pad-bottom-70">
    <div class="container">
       <div class="section-title">
          <h2>Latest <span>News</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
       </div>
       <div class="news-outer">
          <div class="row">
             <div class="col-lg-4 col-md-12 mar-bottom-30">
                <div class="news-item">
                   <div class="news-image">
                      <img src="/client/images/news1.jpg" alt="image">
                   </div>
                   <div class="news-content">
                      <p class="date mar-bottom-5">16 DECEMBER 2019</p>
                      <h4><a href="single-right.html">Why choose Hotux Hotel to travel this summer</a></h4>
                      <div class="room-services mar-bottom-10">
                         <ul>
                            <li><a href="single-right.html"><i class="fa fa-user" aria-hidden="true"></i> By Jack Daniels</a></li>
                            <li><a href="single-right.html"><i class="fa fa-comment" aria-hidden="true"></i> 3 comments</a></li>
                         </ul>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                      <a href="single-left.html">READ MORE <i class="fas fa-angle-double-right"></i></a>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mar-bottom-30">
                <div class="news-item">
                   <div class="news-image">
                      <img src="/client/images/news2.jpg" alt="image">
                   </div>
                   <div class="news-content">
                      <p class="date mar-bottom-5">16 DECEMBER 2019</p>
                      <h4><a href="single-right.html">Why choose Hotux Hotel to travel this summer</a></h4>
                      <div class="room-services mar-bottom-10">
                         <ul>
                            <li><a href="single-right.html"><i class="fa fa-user" aria-hidden="true"></i> By Jack Daniels</a></li>
                            <li><a href="single-right.html"><i class="fa fa-comment" aria-hidden="true"></i> 3 comments</a></li>
                         </ul>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                      <a href="single-left.html">READ MORE <i class="fas fa-angle-double-right"></i></a>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-md-6 mar-bottom-30">
                <div class="news-item">
                   <div class="news-image">
                      <img src="/client/images/news3.jpg" alt="image">
                   </div>
                   <div class="news-content">
                      <p class="date mar-bottom-5">16 DECEMBER 2019</p>
                      <h4><a href="single-right.html">Why choose Hotux Hotel to travel this summer</a></h4>
                      <div class="room-services mar-bottom-10">
                         <ul>
                            <li><a href="single-right.html"><i class="fa fa-user" aria-hidden="true"></i> By Jack Daniels</a></li>
                            <li><a href="single-right.html"><i class="fa fa-comment" aria-hidden="true"></i> 3 comments</a></li>
                         </ul>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                      <a href="single-left.html">READ MORE <i class="fas fa-angle-double-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="section-btn pad-0">
          <a href="#" class="btn btn-black">EXPLORE ALL <i class="fas fa-angle-double-right"></i></a>
       </div>
    </div>
 </section>
 <section class="newsletter">
    <div class="container">
       <div class="section-title title-white">
          <h2>Subscribe to our <span>Newsletter</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
       </div>
       <div class="newsletter-form">
          <form>
             <input type="email" placeholder="Enter your email">
             <a href="#" class="btn btn-orange">SIGN UP</a>
          </form>
       </div>
    </div>
 </section>
@endsection
