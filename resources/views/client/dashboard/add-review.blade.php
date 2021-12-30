@extends("client.dashboard.layouts.main")

@section("content")
            <div class="dashboard-content">
               <div class="row">
                  <div class="col-lg-12 col-sm-12">
                     <div id="add-listing">
                        <div class="add-listing-section">
                            <form method="POST" action="" id="review-form">
                           <div class="add-listing-headline">
                              <h3><i class="sl sl-icon-doc"></i> {{$room->name}} (room) review</h3>
                           </div>
                           <div class="row with-forms">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                There were some errors with your request.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif

                            @if(session()->has('error_message'))
                            <div class="alert alert-danger">
                                {{ session()->get('error_message') }}
                            </div>
                            @endif
                            @if (!is_null($review))
                            <div class="col-md-12">
                                <label>Review</label>
                                <input class="search-field" disabled type="text" value="{{$review->review}}" />
                             </div>
                          </div>
                          <div class="row with-forms">
                             <div class="col-md-6">
                                <label>Rating</label>
                                <input class="search-field" disabled type="text" value="{{$review->rating}} review" />
                             </div>
                             <div class="col-md-6">
                                <label>You created this review on</label>
                                <input type="text" value="{{$review->created_at->format("d, M Y")}}" disabled>
                             </div>
                          </div>
                           </form>
                       </div>
                            @else
                            @csrf
                            <div class="col-md-12">
                                <label>Review *</label>
                                <input class="search-field" required name="review" type="text" placeholder="Tell what you think about our service..." />
                             </div>
                          </div>
                          <div class="row with-forms">
                             <div class="col-md-6">
                                <label>Rating</label>
                                <select class="chosen-select-no-single" name="rating" required>
                                   <option value="">Rating *</option>
                                   <option value="1">1 star (Very Poor)</option>
                                   <option value="2">2 star (Poor)</option>
                                   <option value="3">3 star (Can be better)</option>
                                   <option value="4">4 star (Satisfactory)</option>
                                   <option value="5">5 star (Highly satisfactory)</option>
                                </select>
                             </div>
                             <div class="col-md-6">
                                <label>Review name</label>
                                <input type="text" value="{{auth()->user()->name}}" disabled>
                             </div>
                          </div>
                           </form>
                       </div>
                       <a href="#" class="button preview" onclick="document.getElementById('review-form').submit()">Submit Review <i class="fa fa-arrow-circle-right"></i></a>

                            @endif
                     </div>
                  </div>
               </div>
            </div>
@endsection
