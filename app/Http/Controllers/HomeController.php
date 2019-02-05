<?php

namespace App\Http\Controllers;
use Auth;
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


    public function index()
    {
        return view('admin.dashboard');
    }


    public function student_data()
    {
        return view('admin.student');
    }

    //
}
