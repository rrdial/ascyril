<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{URL::to_asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to_asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="{{URL::base()}}/">@yield('site_title')</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="{{URL::base()}}/">Home</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <div class="container">
      @yield('content')
    </div> {{-- /container --}}
    
    <section id="scripts">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="{{URL::to_asset('js/bootstrap.min.js')}}"></script>
    </section>
  </body>
</html>
