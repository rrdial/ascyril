<?php

class User extends Eloquent {

  public function comments() {
    return $this->has_many('Comment');
  }

  public function gravatar($size = 64) {
    if (isset($this->email)) {
      $url = 'http://www.gravatar.com/avatar/' . md5($this->email);
    } else {
      $url = 'http://www.gravatar.com/avatar/' . md5('noemailprovided');
    }
    if (!($size += 0))
      $size = 64;
    $options = array(
        's' => $size,
        'd' => 'wavatar',
        'r' => 'g'
    );
    return $url . '?' . http_build_query($options);
  }

  public function set_password($password) {
    $this->set_attribute('password', Hash::make($password));
  }

}
