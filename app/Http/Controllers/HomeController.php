<?php

namespace App\Http\Controllers;

use App\User;
use App\Session;
use App\Hit;
use App\Book;
use App\Anouncement;
use Validator;
use Auth;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Session::get();
        $hit = Hit::get();
        return view('welcome')->with('sessions', $name)->with('hits', $hit);
    }

    protected function users() {
      $name = User::where("role","!=","Admin")->get();
      return view('users')->with('users', $name);
    }

    protected function user() {

      return view('user');
    }

    protected function roles() {
      $rules = array(
              'user_id' => 'required|max:100'
          );

          $validator = Validator::make(Input::all(), $rules);

    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/users')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
         $user_obj = new User();
         $user_obj->id = Request::input('user_id');
         $user = User::find($user_obj->id); // Eloquent Model
         $user->update(['role' => "Trainer"]);
         return redirect('/users');
         }

    }

    protected function session() {
      $name = Session::get();
      $users = User::where('role',"=","Trainer")->get();
      $hits = Hit::get();
      return view('sessions')->with('sessions', $name)->with('trainers', $users)->with('hits', $hits);
    }

     protected function addSession(Request $request)
     {

      $rules = array(
              'start' => 'required|max:100',
              'end' => 'required|max:100',
              'trainer' => 'required|max:100'
          );

          $validator = Validator::make(Input::all(), $rules);

    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/session')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
        $name = User::where('id','=',Input::get('trainer'))->get();
        $tr_name = "";
        foreach ($name as $key ) {
          $tr_name = $key->name;
        }
        $session = new Session;
        $session->start     = Input::get('start');
        $session->end    = Input::get('end');
        $session->trainer = Input::get('trainer');
        $session->title = Input::get('title');
        $session->name = $tr_name;

        // save report
        $session->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('/session');

     }
   }

   protected function book() {
     $rules = array(
             'user_id' => 'required|max:100'
         );

         $validator = Validator::make(Input::all(), $rules);

   // check if the validator failed -----------------------
   if ($validator->fails()) {

       // get the error messages from the validator
       $messages = $validator->messages();

       // redirect our user back to the form with the errors from the validator
       return Redirect::to('/')
           ->withErrors($validator);

   } else {
       // validation successful ---------------------------

       // report has passed all tests!
       // let him enter the database

       // create the data for report
       $sess = Input::get('session_id');
       $user_id = Input::get('user_id');
       $user_name = Input::get('user_name');
       $session = Input::get('session') ;
       $trainer = Input::get('trainer') ;

       $count = Book::where('session_id','=',Input::get('session_id'))->where('user_id','=',Input::get('user_id'))->count();
       if($count > 0){
         return Redirect::to('/myschedule');
       }else{

       $rate = Hit::where('title','=',Input::get('title'))->get();
       $amount = "";
       foreach($rate as $key){
       $amount = $key->price;
     }

       $book = new Book;
       $book->session_id     = $sess;
       $book->user_id    = $user_id;
       $book->user_name = $user_name;
       $book->amount = $amount;
       $book->session = $session;
       $book->trainer = $trainer;
       $book->title = Input::get('title');

       // save report
       $book->save();

       // redirect ----------------------------------------
       // redirect our user back to the form so they can do it all over again
       return Redirect::to('/myschedule');
        }
      }

   }

   protected function books() {
     $bookings = Book::get();
     return view('bookings')->with('books', $bookings);
   }

   protected function confirmpayment() {

       // create the data for report
        $book_obj = new Book();
        $book_obj->id = Request::input('id');
        $book = Book::find($book_obj->id); // Eloquent Model
        $book->update(['status' => "paid"]);
        return redirect('/bookings');

      }

   protected function hits() {
     $name = Hit::get();
     return view('hitform')->with('hits', $name);
   }

  protected function programs() {
    $name = Session::get();
    $hit = Hit::get();
    return view('program')->with('sessions', $name)->with('hits', $hit);
  }

 protected function myschedule() {
   $id = Auth::user()->id;
   $name = Book::where('user_id',"=", $id)->get();
   return view('myschedule')->with('books', $name);
 }

protected function mysessions() {
  $name = Auth::user()->name;
  $id = Auth::user()->id;
  $nam = Book::where('trainer',"=", $name)->get();
  $sess = Session::where('trainer',"=", $id)->get();
  return view('mysessions')->with('books', $nam)->with('sessions', $sess);
}

    protected function addHit(Request $request)
    {

     $rules = array(
             'title' => 'required|max:100',
             'price' => 'required|max:100'
         );

         $validator = Validator::make(Input::all(), $rules);

   // check if the validator failed -----------------------
   if ($validator->fails()) {

       // get the error messages from the validator
       $messages = $validator->messages();

       // redirect our user back to the form with the errors from the validator
       return Redirect::to('/session')
           ->withErrors($validator);

   } else {
       // validation successful ---------------------------

       // report has passed all tests!
       // let him enter the database

       // create the data for report
       $hit = new Hit;
       $hit->title     = Input::get('title');
       $hit->price    = Input::get('price');

       // save report
       $hit->save();

       // redirect ----------------------------------------
       // redirect our user back to the form so they can do it all over again
       return Redirect::to('/hit');

    }
  }


 protected function anounce(Request $request)
 {

  $rules = array(
          'note' => 'required|max:200'
      );

      $validator = Validator::make(Input::all(), $rules);

// check if the validator failed -----------------------
if ($validator->fails()) {

    // get the error messages from the validator
    $messages = $validator->messages();

    // redirect our user back to the form with the errors from the validator
    return Redirect::to('/anouncements')
        ->withErrors($validator);

} else {
    // validation successful ---------------------------

    // report has passed all tests!
    // let him enter the database

    // create the data for report
    $anouncement = new Anouncement;
    $anouncement->note     = Input::get('note');

    // save report
    $anouncement->save();

    // redirect ----------------------------------------
    // redirect our user back to the form so they can do it all over again
    return Redirect::to('/anouncements');

 }
}




}
