@layout('template')
@section('title', Auth::user()->nickname . "'s profile")

@section('content')
<div class="page-header">
  <h1>User Profile</h1>
</div>

@if (Session::has('profile_updated'))
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Profile updated successfully!</h4>
</div>
@endif

<?php echo Form::open('profile', 'POST', array('class' => 'form-horizontal')) ?>
<div class="control-group">
  <label class="control-label" for="nickname">Username</label>
  <div class="controls">
    <input type="text" id="disabledInput" value="{{Auth::user()->username}}" disabled>
    <span class="help-inline muted">usernames cannot be changed</span>
  </div>
</div>
<div class="control-group <?php if($errors->has('nickname')) echo 'error' ?>">
  <label class="control-label" for="nickname">Display Name</label>
  <div class="controls">
    <input type="text" id="nickname" name="nickname" placeholder="Huck Finn" value="{{Input::old('nickname', Auth::user()->nickname)}}">
    <span class="help-inline"><?php echo implode(' ', $errors->get('nickname')) ?></span>
  </div>
</div>
<div class="control-group <?php if($errors->has('email')) echo 'error' ?>">
  <label class="control-label" for="email">Email</label>
  <div class="controls">
    <input type="text" id="email" name="email" placeholder="Email" value="{{Input::old('email', Auth::user()->email)}}">
    <span class="help-inline"><?php echo implode(' ', $errors->get('email')) ?></span>
  </div>
</div>
<hr>
<div class="control-group <?php if($errors->has('password')) echo 'error' ?>">
  <label class="control-label" for="password">New Password</label>
  <div class="controls">
    <input type="password" id="password" name="password">
    <span class="help-inline"><?php echo implode(' ', $errors->get('password')) ?></span>
  </div>
</div>
<div class="control-group <?php if($errors->has('password')) echo 'error' ?>">
  <label class="control-label" for="password_confirmation">Confirm New Password</label>
  <div class="controls">
    <input type="password" id="password_confirmation" name="password_confirmation">
  </div>
</div>
<div class="control-group">
  <div class="controls">
    <button type="submit" class="btn">Save</button>
  </div>
</div>
<?php echo Form::close() ?>

@endsection
