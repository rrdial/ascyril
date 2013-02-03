<?php

class Equipment_Computers_Controller extends Base_Controller {

  public function action_index() {
    return View::make('computers.index')
                    ->with('computers', Computer::all());
  }

}
