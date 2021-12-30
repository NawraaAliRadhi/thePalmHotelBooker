<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>The Palm Hotel - Dashboard</title>
      <link rel="shortcut icon" type="image/x-icon" href="/client/images/favicon.png">
      <link href="/client/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="/client/css/default.css" rel="stylesheet" type="text/css">
      <link href="/client/css/style.css" rel="stylesheet" type="text/css">
      <link href="/client/css/plugin.css" rel="stylesheet" type="text/css">
      <link href="/client/css/dashboard.css" rel="stylesheet" type="text/css">
      <link href="/client/css/icons.css" rel="stylesheet" type="text/css">
      @hasSection("custom_css")
        @yield("custom_css")
      @endif
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
   </head>
   <body>
      <div id="container-wrapper">
         <div id="dashboard">
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
            <div class="dashboard-sticky-nav">
               <div class="content-left pull-left">
                  <a href="/"><img src="/system/images/palm-logo-white.png" alt="logo" style="width: 100px"></a>
               </div>
               <div class="content-right pull-right">
                  <div class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown">
                        <div class="profile-sec">
                           <div class="dash-content">
                              <h4>{{auth()->user()->name}}</h4>
                              <span>Customer</span>
                           </div>
                        </div>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="#"><i class="sl sl-icon-settings"></i>Settings</a></li>
                        <li><a href="#"><i class="sl sl-icon-user"></i>Profile</a></li>
                        <li><a href="#"><i class="sl sl-icon-lock"></i>Change Password</a></li>
                        <li><a href="#"><i class="sl sl-icon-power"></i>Logout</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="dashboard-nav">
               <div class="dashboard-nav-inner">
                  <ul>
                     <li class="{{ (isset($active) && $active === "dashboard" ? 'active' : "") }}" ><a href="/dashboard"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                     <li class="{{ (isset($active) && $active === "profile" ? 'active' : "") }}"><a href="/dashboard/profile"><i class="sl sl-icon-user"></i> Edit Profile</a></li>
                     <li class="{{ (isset($active) && $active === "review" ? 'active' : "") }}"><a href="/dashboard/reviews"><i class="sl sl-icon-star"></i> Reviews</a></li>
                     <li><a href="/auth/logout"><i class="sl sl-icon-power"></i> Logout</a></li>
                  </ul>
               </div>
            </div>

            @yield("content")

            <div class="copyrights">
                <p>{{date("Y")}} <i class="fa fa-copyright" aria-hidden="true"></i> Made by <a href="#" target="_blank">Nawraa</a></p>
             </div>
          </div>
       </div>
       <div id="back-to-top">
          <a href="#"></a>
       </div>

       <script src="/client/js/jquery-3.3.1.min.js"></script>
       <script src="/client/js/bootstrap.min.js"></script>
       <script src="/client/js/main.js"></script>
       <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
       <script src="/client/js/chart.js"></script>
       <script src="/client/js/dashboard.js"></script>
       @hasSection("custom_scripts")
            @yield("custom_scripts")
       @endif
    </body>
 </html>
