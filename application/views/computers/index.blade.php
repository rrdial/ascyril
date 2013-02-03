@layout('template')

@section('title', 'All Computers')

@section('content')
<div class="page-header">
  <h1>Computers</h1>
</div>

<ul>
  <?php foreach ($computers as $c) : ?>
    <li>{{$c->asset_tag}}</li>
  <?php endforeach; ?>
</ul>
@endsection
