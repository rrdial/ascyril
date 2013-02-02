@layout('template')

@section('content')
<?php echo Form::open('login', 'POST', array('class' => 'form-signin')) ?>

<!-- check for login errors flash var -->
@if (Session::has('login_errors'))
<span class="error">Username or password incorrect.</span>
@endif

<h2 class="form-signin-heading">Please sign in</h2>
<?php echo Form::text('username', NULL, array('placeholder' => 'username', 'class' => 'input-block-level')) ?>
<?php echo Form::password('password', array('placeholder' => 'password', 'class' => 'input-block-level')) ?>
<button class="btn btn-large btn-primary" type="submit">Sign in</button>

{{ Form::close() }}
@endsection
