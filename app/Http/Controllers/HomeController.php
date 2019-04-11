<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\SmsLog;
use App\Models\Student;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


    public function index()
    {
        $data['students'] = Student::count();
        $data['student_cards'] = Student::whereNotNull('rf_id')->count();
        $toDate = Carbon::now()->format('Y-m-d');
        $data['attends'] = Attendance::where('date', $toDate)->count();
        $data['absences'] = $data['students'] - $data['attends'];
        $data['sms'] = SmsLog::where('date', $toDate)->count();
        return view('dashboard')->with($data);
    }


}
