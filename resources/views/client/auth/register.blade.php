@extends("layouts.client.main")
@section("content")
<section class="breadcrumb-outer">
    <div class="container">
       <div class="breadcrumb-content">
          <h2>Authentication</h2>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
             </ul>
          </nav>
       </div>
    </div>
 </section>
 <section class="login">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="login-image text-center">
                <img src="/system/images/the-palm-logo.png" alt="image" style="width: 200px;">
                <p class="mar-top-10">Hotel & Resort</p>
             </div>
          </div>

          <div class="" style="margin: auto; width: 40%">
             <div class="login-content pad-0">
                <h3>Create an Account</h3>
                <br />
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
                <form method="post" action="">
                    @csrf
                   <div class="form-group">
                      <input type="text" name="name" placeholder="Enter your name">
                   </div>
                   <div class="form-group">
                      <input type="email" name="email" placeholder="Enter email address">
                   </div>
                   <div class="form-group">
                      <input type="password" name="password" placeholder="Enter password">
                   </div>
                   <div class="form-group">
                      <input type="password" name="password_confirmation" placeholder="Confirm password">
                   </div>
                   <div class="form-btn">
                    <button type="submit" class="btn btn-primary compulsoryBtn">SIGN UP</button>
                 </div>
                </form>
                <ul class="social-links">
                   <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
             </div>
          </div>

       </div>
    </div>
 </section>
@endsection
