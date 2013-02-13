<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
  | breeze to setup your application using Laravel's RESTful routing and it
  | is perfectly suited for building large applications and simple APIs.
  |
  | Let's respond to a simple GET request to http://example.com/hello:
  |
  |		Route::get('hello', function()
  |		{
  |			return 'Hello World!';
  |		});
  |
  | You can even respond to more than one URI:
  |
  |		Route::post(array('hello', 'world'), function()
  |		{
  |			return 'Hello World!';
  |		});
  |
  | It's easy to allow URI wildcards using (:num) or (:any):
  |
  |		Route::put('hello/(:any)', function($name)
  |		{
  |			return "Welcome, $name.";
  |		});
  |
 */

Route::get('/', 'home@index');

//Route::controller('equipment.computers');

Route::get('computers', array('before' => 'auth', 'uses' => 'computers@index'));
Route::post('computers', array('before' => 'auth', 'uses' => 'computers@index'));

Route::get('computers/(:num)', array('before' => 'auth',
    'as' => 'computer_view',
    function($asset_tag) {
      return View::make('computers.view')
                      ->with('computer', Computer::where_asset_tag($asset_tag)->first());
    })
);

Route::get('computers/(:num)/edit', function($asset_tag) {
          //
        });

Route::post('computers/(:num)/edit', array('before' => 'auth|csrf',
    function($asset_tag) {
      //
    })
);

/*
 * Routing for user profile shtuff
 */
Route::get('profile', array(
    'before' => 'auth',
    function() {
      return View::make('admin.profile');
    }
));
Route::post('profile', array(
    'before' => 'auth',
    function() {
      $user_update = array(
          'nickname' => Input::get('nickname'),
          'email' => Input::get('email'),
          'password' => Input::get('password'),
          'password_confirmation' => Input::get('password_confirmation'),
      );
      $rules = array(
          'email' => 'required|email|unique:users,email,' . Auth::user()->id,
          'nickname' => 'required|max:128',
          'password' => 'confirmed',
      );
      $v = Validator::make($user_update, $rules);
      if ($v->fails()) {
        return Redirect::to('profile', 303)
                        ->with_errors($v)
                        ->with_input('except', array('password', 'password_confirmation'));
      } else {
        $user = Auth::user();
        $user->email = $user_update['email'];
        $user->nickname = $user_update['nickname'];
        if ($user_update['password'])
          $user->password = Hash::make($user_update['password']);
        $user->save();
        return Redirect::to('profile', 303)
                        ->with('profile_updated', TRUE);
      }
    }
));

/*
 * Route for loggin in and logging out.
 */
Route::get('login', function() {
          if (Auth::check()) {
            return Redirect::to('/');
          }
          return View::make('pages.login');
        });

Route::post('login', function() {
          $credentials = array(
              'username' => Input::get('username'),
              'password' => Input::get('password')
          );
          if (Auth::attempt($credentials)) {
            return Redirect::to('/');
          } else {
            return Redirect::to('login')
                            ->with('login_errors', true);
          }
        });

Route::get('logout', function() {
          Auth::logout();
          return Redirect::to('login')
                          ->with('logout_successful', true);
        });

/*
  |--------------------------------------------------------------------------
  | Application 404 & 500 Error Handlers
  |--------------------------------------------------------------------------
  |
  | To centralize and simplify 404 handling, Laravel uses an awesome event
  | system to retrieve the response. Feel free to modify this function to
  | your tastes and the needs of your application.
  |
  | Similarly, we use an event to handle the display of 500 level errors
  | within the application. These errors are fired when there is an
  | uncaught exception thrown in the application.
  |
 */

Event::listen('404', function() {
          return Response::error('404');
        });

Event::listen('500', function() {
          return Response::error('500');
        });

/*
  |--------------------------------------------------------------------------
  | Route Filters
  |--------------------------------------------------------------------------
  |
  | Filters provide a convenient method for attaching functionality to your
  | routes. The built-in before and after filters are called before and
  | after every request to your application, and you may even create
  | other filters that can be attached to individual routes.
  |
  | Let's walk through an example...
  |
  | First, define a filter:
  |
  |		Route::filter('filter', function()
  |		{
  |			return 'Filtered!';
  |		});
  |
  | Next, attach the filter to a route:
  |
  |		Route::get('/', array('before' => 'filter', function()
  |		{
  |			return 'Hello World!';
  |		}));
  |
 */

Route::filter('before', function() {
          // Do stuff before every request to your application...
        });

Route::filter('after', function($response) {
          // Do stuff after every request to your application...
          $response->header('Expires', 'Sun, 27 Oct 1985 07:45:00 GMT');
          $response->header('Last-Modified', gmdate("D, d M Y H:i:s") . " GMT");
          $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
          $response->header('Cache-Control', 'post-check=0, pre-check=0', false);
          $response->header('Pragma', 'no-cache');
        });

Route::filter('csrf', function() {
          if (Request::forged())
            return Response::error('500');
        });

Route::filter('auth', function() {
          if (Auth::guest())
            return Redirect::to('login')
                            ->with('return', URL::current());
        });
