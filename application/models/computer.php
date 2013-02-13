<?php

class Computer extends Eloquent {

  public function client() {
    return $this->belongs_to('Client');
  }
  
  public function status() {
    return $this->belongs_to('Status');
  }
  
  public function comments() {
    return $this->has_many('Comment');
  }

}
