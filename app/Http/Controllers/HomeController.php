<?php

namespace App\Http\Controllers;

class HomeController extends Controller
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
        return view('admin.master');
    }

    public function student_data(){
        return view('admin.student');
    }

    //
}
