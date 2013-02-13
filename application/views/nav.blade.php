<?php $greeting = array('Hello', 'Greetings', 'Welcome', 'Bonjour', 'G′day', 'Howdy', '♥', '′allo', 'Hey'); ?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="{{URL::home()}}">Caarl</a>
      @if (Auth::check())
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="{{URI::is('clients*') ? 'active' : ''}}"><a href="{{URL::to('clients')}}">Clients</a></li>
          <li class="{{URI::is('computers*') ? 'active' : ''}}"><a href="{{URL::to('computers')}}">Computers</a></li>
        </ul>
        <ul class="nav pull-right">
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$greeting[mt_rand(0,count($greeting)-1)]}} {{Auth::user()->nickname}}! <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::to('profile')}}"><i class="icon-user"></i> Edit Profile</a></li>
              <li class="divider"></li>
              <li><a href="{{URL::to('logout')}}"><i class="icon-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
      @endif
    </div>
  </div>
</div>
