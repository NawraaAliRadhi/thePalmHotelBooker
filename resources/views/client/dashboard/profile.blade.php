@extends("client.dashboard.layouts.main")

@section("content")
            <div class="dashboard-content">
               <div class="dashboard-form">
                <form method="POST" action="">
                @csrf

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

                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                        <div class="dashboard-list-box">
                           <h4 class="gray">Profile Details</h4>
                           <div class="dashboard-list-box-static">
                              <div class="my-profile">
                                 <label>Your Name *</label>
                                 <input name="name" value="{{old('name', auth()->user()->name)}}" type="text">
                                 <label>Phone Number *</label>
                                 <input name="phone" value="{{old('phone', auth()->user()->phone)}}" type="text">
                                 <label>Email Address *</label>
                                 <input value="{{old('email', auth()->user()->email)}}" name="email" type="email">
                                 <label>Tell us about yourself *</label>
                                 <textarea name="notes" id="notes" cols="30" rows="10">{{old('notes', auth()->user()->notes)}}</textarea>
                              </div>
                              <button class="button" type="submit">Save Changes</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-xs-12 padding-left-30">
                        <div class="dashboard-list-box margin-top-0">
                           <h4 class="gray">Your Address</h4>
                           <div class="dashboard-list-box-static">
                              <div class="my-profile">
                                 <label>Address *</label>
                                 <input type="text" name="address" value="{{auth()->user()->address}}">                                
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </form>
               </div>
            </div>
@endsection
