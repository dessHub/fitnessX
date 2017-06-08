<?php

namespace App\Http\Controllers;

use App\User;
use App\Session;
use App\Hit;
use Validator;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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


}
