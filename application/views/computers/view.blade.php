@layout('template')

@section('title', 'Computer details')

@section('content')
<div class="page-header">
  <h1>Computer {{$computer->asset_tag}} <a class="label" href="{{URL::to_route('computer_edit', array($computer->asset_tag))}}">edit</a></h1>
</div>

@if (Session::has('login_errors'))
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Update successful!</strong>
</div>
@endif

<div class="row">
  <div class="span4">
    <h4>Current Status</h4>
    @if ($computer->status)
    <div class="alert alert-{{$computer->status->class}}">
      {{$computer->status->name}}
    </div>
    @else
    Nothing special
    @endif
  </div>
  <div class="span4">
    <h4>Serial Number</h4>
    {{$computer->sn}}
  </div>
  <div class="span4">
    <h4>ARD Name</h4>
    {{$computer->name}}
  </div>
</div>

<h2 class="page-header">Activity Log</h2>
<?php foreach ($computer->comments()->get() as $log) : ?>
  <div class="media">
    <div class="pull-left">
      <img class="media-object" src="{{$log->user->gravatar(64)}}">
    </div>
    <div class="media-body">
      <h4 class="media-heading">{{$log->message}}</h4>
      {{$log->user->nickname}}
    </div>
  </div>
<?php endforeach; ?>
<div class="row">
  <div class="span12">
    {{Form::open('comment', 'POST', array('class' => 'form-inline'))}}
    <fieldset>
      <legend>New comment</legend>
      {{Form::hidden('computer_id', $computer->id)}}
      {{Form::textarea('message', Input::get('message'), array('class' => 'span8', 'rows' => 2))}}
      {{Form::select('status_id', $dropdown, Input::get('status_id', $computer->status_id), array('class' => 'span3'))}}
      <button class="btn" type="submit">Submit</button>
    </fieldset>
    {{Form::close()}}
  </div>
</div>

<?php //var_dump($computer); ?>
@endsection
