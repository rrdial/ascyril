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

  public function get_edit($asset_tag = 0) {
    if ($computer = Computer::where_asset_tag($asset_tag)->first()) {
      $statuses = Status::all();
      $dropdown = array('0' => '');
      foreach ($statuses as $s) {
        $dropdown[$s->id] = $s->name;
      }

      return View::make('computers.form')
                      ->with('computer', $computer)
                      ->with('dropdown', $dropdown);
    } else {
      return Response::error(404);
    }
  }

  public function post_edit() {
    $rules = array(
        'id' => 'required|integer|exists:computers',
        'status_id' => 'integer|exists:statuses,id',
        'asset_tag' => 'required|integer',
        'sn' => 'max:31',
        'name' => 'max:63',
    );
    $input = array(
        'id' => Input::get('id'),
        'status_id' => Input::get('status_id'),
        'asset_tag' => Input::get('asset_tag'),
        'sn' => Input::get('sn'),
        'name' => Input::get('name'),
    );
    if ($input['status_id'] == 0)
      unset($input['status_id'], $rules['status_id']);
    $v = Validator::make($input, $rules);
    if ($v->passes()) {
      if (!isset($input['status_id']))
        $input['status_id'] = NULL;
      $c = Computer::update($input['id'], $input);
      return Redirect::to($input['asset_tag'], 303)
                      ->with('updated', TRUE);
    } else {
      var_dump($v->errors);
    }
  }

}
