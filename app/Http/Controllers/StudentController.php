<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{


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