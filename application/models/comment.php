<?php

class Comment extends Eloquent {
  
  public function user() {
    return $this->belongs_to('user');
  }
  
  public function computer() {
    return $this->belongs_to('computer');
  }

}
