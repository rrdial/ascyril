<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | CAaRL</title>
    <link href="{{URL::to_asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to_asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="{{URL::to_asset('css/styles.css')}}" rel="stylesheet">
  </head>
  <body>
    @include('nav')
    
    <div class="container">
      @yield('content')
    </div> {{-- /container --}}
    
    <section id="scripts">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="{{URL::to_asset('js/bootstrap.min.js')}}"></script>
    </section>
  </body>
</html>
