<?php

class Status extends Eloquent {
  
  public function computer() {
    return $this->has_many('Computer');
  }

}
