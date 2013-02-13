<?php

class Computers_Controller extends Base_Controller {

  public $restful = true;

  public function get_index() {
    return View::make('computers.index')
                    ->with('computers', Computer::all());
  }
  
  public function post_index() {
    var_dump(Input::all());
  }

}
