<?php

class Computer extends Eloquent {

  public function client() {
    return $this->belongs_to('Client');
  }

}