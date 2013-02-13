@layout('template')

@section('title', 'Computer details')

@section('content')
<div class="page-header">
  <h1>Computer {{$computer->asset_tag}}</h1>
</div>

<?php /*
<dl>
  <dt>Current status</dt>
  <dd>{{$computer->status ? $computer->status->value : 'unavailable'}}</dd>
  
  <dt>Serial Number</dt>
  <dd>{{$computer->sn}}</dd>
  
  <dt>ARD name</dt>
  <dd>gates-student-{{$computer->name}}</dd>
</dl>
*/ ?>
<div class="row">
  <div class="span4">
    <h4>Current Status</h4>
    {{$computer->status ? $computer->status->value : 'unavailable'}}
  </div>
  <div class="span4">
    <h4>Serial Number</h4>
    {{$computer->sn}}
  </div>
  <div class="span4">
    <h4>ARD Name</h4>
    gates-student-{{intval($computer->name)}}
  </div>
</div>

<h2 class="page-header">Activity Log</h2>
<?php
$user = User::find(1);
$log = new stdClass();
$log->message = 'Smashed it with a sledge hammer.';
$log->user = $user;

$logs = array($log);
?>
<?php foreach ($logs as $log) : ?>
  <div class="media">
    <div class="pull-left">
      <img class="media-object" src="{{$log->user->gravatar(64)}}">
    </div>
    <div class="media-body">
      <h4 class="media-heading">{{$log->user->nickname}}</h4>
      {{$log->message}}
    </div>
  </div>
<?php endforeach; ?>

<?php //var_dump($computer); ?>
@endsection
