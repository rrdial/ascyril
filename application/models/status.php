<?php

class Status extends Eloquent {
  
  public $value = 'unavailable';
  
  public function computer() {
    return $this->has_many('Computer');
  }

}
