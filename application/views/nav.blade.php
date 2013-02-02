<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="{{URL::base()}}/">Caarl</a>
      @if (Auth::check())
      <p class="navbar-text pull-right">
        Hello {{Auth::user()->nickname}}!
      </p>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class=""><a href="{{URL::base()}}">Home</a></li>
        </ul>
      </div><!--/.nav-collapse -->
      @endif
    </div>
  </div>
</div>
