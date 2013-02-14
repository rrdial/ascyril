@layout('template')

@section('title', 'Editing Computer details')

@section('content')
<div class="page-header">
  <h1>Editing computer details</h1>
</div>

{{Form::open()}}
<h4>Asset Tag</h4>
<?php echo Form::hidden('id', $computer->id) ?>
<?php echo Form::text('asset_tag', Input::get('asset_tag', $computer->asset_tag), array('class' => 'span4')) ?>
<div class="row">
  <div class="span4">
    <h4>Current Status</h4>
    <?php echo Form::select('status_id', $dropdown, Input::get('status_id', $computer->status_id), array('class' => 'span4')); ?>
  </div>
  <div class="span4">
    <h4>Serial Number</h4>
    <?php echo Form::text('sn', Input::get('sn', $computer->sn), array('class' => 'span4')) ?>
  </div>
  <div class="span4">
    <h4>ARD Name</h4>
    <?php echo Form::text('name', Input::get('name', $computer->name), array('class' => 'span4')) ?>
  </div>
</div>
<button type="submit" class="btn btn-large btn-inverse">Save!</button>
{{Form::close()}}
@endsection
