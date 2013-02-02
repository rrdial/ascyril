@layout('template')

@section('content')
<?php echo Form::open('login', 'POST', array('class' => 'form-signin')) ?>

<!-- check for login errors flash var -->
@if (Session::has('login_errors'))
<div class="alert alert-error">
  <h4>Error</h4>
  Incorrect username and password combination.
</div>
@endif

@if (Session::has('logout_successful'))
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Logout successful!</strong>
</div>
@endif

<h2 class="form-signin-heading">Please sign in</h2>
<?php echo Form::text('username', NULL, array('placeholder' => 'username', 'class' => 'input-block-level')) ?>
<?php echo Form::password('password', array('placeholder' => 'password', 'class' => 'input-block-level')) ?>
<button class="btn btn-large btn-primary" type="submit">Sign in</button>

{{ Form::close() }}
@endsection
