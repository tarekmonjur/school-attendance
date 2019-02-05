<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
	 public function __construct()
    {
       
    }

    public function index()
    {
    	return view('login');
    }

    public function login(Request $request)
    {
        $validator = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);
    }

 }