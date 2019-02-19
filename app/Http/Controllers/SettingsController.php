<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/19/19
 * Time: 09:52 AM
 */

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = [];
        return view('settings')->with($data);
    }


    public function store(Request $request)
    {

    }

}