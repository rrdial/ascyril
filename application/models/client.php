<?php

class Client extends Eloquent {

  public function computers() {
    return $this->has_many('computer');
  }

}
