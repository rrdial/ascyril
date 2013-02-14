<?php

class Comment extends Eloquent {
  
  public function computer() {
    return $this->belongs_to('computer');
  }
  
  public function status() {
    return $this->belongs_to('Status');
  }
  
  public function user() {
    return $this->belongs_to('user');
  }
  
  public function get_created_at() {
    return date('g:ia M j, Y', strtotime($this->get_attribute('created_at')));
  }

}
