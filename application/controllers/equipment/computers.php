<?php

class Equipment_Computers_Controller extends Base_Controller {
  
  public $restful = true;
  
  public function get_index() {
    return $this->action_index();
  }

  public function action_index() {
    return View::make('computers.index')
                    ->with('computers', Computer::all());
  }

}
