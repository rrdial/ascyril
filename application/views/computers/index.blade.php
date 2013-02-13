@layout('template')

@section('title', 'All Computers')

@section('content')
<div class="page-header">
  <h1>Computers</h1>
</div>

{{Form::open(NULL,NULL,array('class'=>'form-inline'))}}
  <input type="number" name="asset_tag" placeholder="Asset tag…" required min="1" step="1">
  <button type="submit" class="btn">Create!</button>
{{Form::close()}}

<ul>
  <?php foreach ($computers as $c) : ?>
    <li><a class="" href="<?php echo \Laravel\URL::to_route('computer_view', array($c->asset_tag)) ?>">{{$c->asset_tag}}</a></li>
  <?php endforeach; ?>
</ul>

@endsection
