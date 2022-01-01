
 <header class="main_header_area headerstyle-2">
    <div class="header-content">
       <div class="container">
          <div class="links links-left">
             <ul>
                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>info@thepalmhotel.com</a></li>
                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +973 1777-8574</a></li>
                <li>
                   <select>
                      <option>Eng</option>
                      <option>Fra</option>
                      <option>Esp</option>
                   </select>
                </li>
             </ul>
          </div>
          <div class="links links-right pull-right">
             <ul>

                @if (auth()->check())
                    <li><a href="/auth/logout"><i class="fa fa-lock-open" aria-hidden="true"></i> Logout</a></li>
                @else
                    <li><a href="/auth/login"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
                    <li><a href="/auth/register"><i class="fa fa-pen" aria-hidden="true"></i> Register</a></li>
                @endif

                <li>
                   <ul class="social-links">
                      <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                   </ul>
                </li>
             </ul>
          </div>
       </div>
    </div>
    <div class="header_menu affix-top">
       <nav class="navbar navbar-default">
          <div class="container">
             <div class="navbar-header">
                <a class="navbar-brand" href="/">
                <img alt="Image" src="/system/images/the-palm-logo.png" style="width: 100px;">
                </a>
             </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="responsive-menu">

                   <li class="active">
                      <a href="/" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                   </li>

                   <li>
                    <a href="/rooms" role="button" aria-haspopup="true" aria-expanded="false">Rooms</a>
                 </li>

                   <li>
                      <a href="/" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
                   </li>


                   <li>
                    <a href="/dashboard" role="button" aria-haspopup="true" aria-expanded="false">My Dashboard</a>
                 </li>

                </ul>
                <div class="nav-btn">
                   <a href="#" class="btn btn-orange">Book Now</a>
                </div>
             </div>
          </div>
          <div id="slicknav-mobile"></div>
       </nav>
    </div>
 </header>
