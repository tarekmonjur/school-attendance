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
		return view('admin.student');
	}
 

	public function create(){
		return view('admin.add_student');
	}

	public function store(){

	}
	public function edit(){

	}

	public function distory(){

	}


}