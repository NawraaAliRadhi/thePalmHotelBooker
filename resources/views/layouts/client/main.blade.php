<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home | The palm hotel</title>
      <link rel="shortcut icon" type="image/x-icon" href="/client/images/favicon.png">
      <link href="/client/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="/client/css/default.css" rel="stylesheet" type="text/css">
      <link href="/client/css/style.css" rel="stylesheet" type="text/css">
      <link href="/client/css/plugin.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

      @hasSection("custom_scripts")
        @yield("custom_css")
      @endif

      <style>
          .compulsoryBtn {
            background-color: #fe4e37 !important;
            border-color: #fe4e37 !important;
          }
      </style>

   </head>
   <body>

      @include("layouts.client.partials.header")

      @yield("content")

      @include("layouts.client.partials.footer")

      <script src="/client/js/jquery-3.3.1.min.js"></script>
      <script src="/client/js/bootstrap.min.js"></script>
      @hasSection("custom_scripts")
        @yield("custom_scripts")
      @endif
      <script src="/client/js/main.js"></script>
      <script src="/client/js/custom-nav.js"></script>
      <script src="/client/js/custom-swiper2.js"></script>
      <script src="/client/js/custom-singledate.js"></script>
   </body>
</html>
