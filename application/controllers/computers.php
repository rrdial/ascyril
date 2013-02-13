<?php

class Computers_Controller extends Base_Controller {

  public $restful = true;

  public function get_index() {
    return View::make('computers.index')
                    ->with('computers', Computer::all());
  }

  public function post_index() {
    $input = array(
        'asset_tag' => Input::get('asset_tag')
    );
    $rules = array(
        'asset_tag' => 'required|integer|unique:computers'
    );
    $v = Validator::make($input, $rules);
    if ($v->passes()) {
      $c = new Computer();
      $c->asset_tag = $input['asset_tag'] + 0;
      $c->save();
      return Redirect::to_action('computers@index', array('computer_inserted' => TRUE), 303);
    } else {
      return Redirect::to_action('computers@index', array(), 303)
                      ->with_errors($v)
                      ->with_input();
    }
  }

}
