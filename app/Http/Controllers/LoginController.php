<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Session;


class LoginController extends Controller
{
	 public function __construct()
    {
       
    }

    public function index()
    {
    	return view('login');
    }

    public function admin_login(Request $request)
    {
    	 
        $user_email    = $request->email;
        $user_password = $request->password;

        $result = DB::table('users')
                    ->where('user_email',$user_email)
                    ->where('user_password',$user_password)
                    ->first();
        
            if ($result) {
                Session::put('user_email',$result->user_email);
                Session::put('user_name',$result->user_name);
                Session::put('user_id',$result->user_id);
                return Redirect::to('/deshboard');
            }else{
                Session::put('message','Oops!! Your Email or password wrong!!');
                return Redirect::to('/dashboard');
            }


  }

 }