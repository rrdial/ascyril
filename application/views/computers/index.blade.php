@layout('template')

@section('title', 'All Computers')

@section('content')
<div class="page-header">
  <h1>Computers</h1>
</div>

<?php foreach ($computers as $c) : ?>
  <a class="" href="<?php echo \Laravel\URL::to_route('computer_view', array($c->asset_tag)) ?>">{{$c->asset_tag}}</h4>
<?php endforeach; ?>
@endsection
