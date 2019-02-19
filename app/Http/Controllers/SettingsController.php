<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/19/19
 * Time: 09:52 AM
 */

namespace App\Http\Controllers;

use App\Models\Setting;
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
        $data['settings'] = Setting::find(1);
        return view('settings')->with($data);
    }


    public function store(Request $request)
    {
        try {
            $setings = Setting::find(1);
            if($setings) {
                $setings->in_sms = $request->in_sms;
                $setings->out_sms = $request->out_sms;
                $setings->update();
            }else{
                $setings = new Setting;
                $setings->in_sms = $request->in_sms;
                $setings->out_sms = $request->out_sms;
                $setings->save();
            }
            $request->session()->flash('success', 'Settings successfully saved.');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Settings not saved.');
        }
        return redirect('/settings');
    }

}