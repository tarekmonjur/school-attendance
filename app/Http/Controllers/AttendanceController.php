<?php

namespace App\Http\Controllers;

class AttendanceController extends Controller
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

		return view('admin.attendance_reports');
	}

	public function create(){

	}

	public function store(){

	}

	public function edit(){

	}

	public function update(){

	}
}