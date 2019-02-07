<?php

namespace App\Http\Controllers;

class StudentController extends Controller
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


	public function index(){
		return view('student.index');
	}
 

	public function create(){
		return view('student.add');
	}

	public function store(){

	}
	public function edit(){

	}

	public function distory(){

	}


}