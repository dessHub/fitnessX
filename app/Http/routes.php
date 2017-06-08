<?php
namespace App\Http\Controllers;

use App\User;
use App\Session;
use App\Hit;
use App\Anouncement;
use Validator;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$this->get('/', function () {
$name = Session::get();
$hit = Hit::get();
return view('welcome')->with('sessions', $name)->with('hits', $hit);
});

$this->get('/programs', function () {
$name = Session::get();
$hit = Hit::get();
return view('program')->with('sessions', $name)->with('hits', $hit);
});

$this->get('/anouncements', function () {

  $name = Anouncement::get();
  return view('anouncements')->with('anounces', $name);
});

$this->auth();

//Route::get('/', 'HomeController@index');

// App Routes
$this->get('users', 'HomeController@users');
$this->get('user', 'HomeController@user');
$this->post('role', 'HomeController@roles');
$this->get('session', 'HomeController@session');
$this->post('/session', 'HomeController@addSession');
$this->get('hit', 'HomeController@hits');
$this->get('prog', 'HomeController@programs');
$this->post('create/hit', 'HomeController@addHit');

$this->post('book', 'HomeController@book');
$this->get('bookings', 'HomeController@books');
$this->post('confirmpayment', 'HomeController@confirmpayment');
$this->get('myschedule', 'HomeController@myschedule');
$this->get('mysessions', 'HomeController@mysessions');


$this->post('anounce', 'HomeController@anounce');
