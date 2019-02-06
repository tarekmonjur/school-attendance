<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/5/19
 * Time: 10:48 AM
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('errors', $validator->errors()->messages());
            $request->session()->flash('old', $request->all());
            return redirect('/login');
        }
        $user = User::where('email', $request->input('email'))->first();
        if(!$user) {
            $request->session()->flash('error', 'Sorry! Your Username is incorrect.');
            return redirect('/login');
        }
        if (app('hash')->check($request->input('password'), $user->password)) {
            $apiToken = str_random(32).time();
            $user->api_token = $apiToken;
            $user->save();
            session()->put('api-token', $apiToken);

            return redirect('/dashboard');
        }
        $request->session()->flash('error', 'Sorry! Username/Password is incorrect.');
        return redirect('/login');
    }


    public function logout()
    {
        try{
            User::where('api_token', session()->get('api-token'))
                ->update(['api_token' => '']);
            session()->flush();
            session()->flush('success', 'Logout success.');
        }catch(\Exception $e){
            session()->flush('error', 'Logout not success.');
        }
        return redirect('/login');
    }


 }