<?php

namespace App\Http\Controllers;

class HomeControler extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return view('layout');
    }

    public function page(){
        return view('page');
    }

    //
}
