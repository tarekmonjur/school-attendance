<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
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


    public function index(Request $request)
    {
        $data = [];
        if($request->has('from_date')){
            $data['from_date'] = $request->input('from_date');
        }else{
            $data['from_date'] = Carbon::now()->subMonth(1)->format('Y-m-d');
        }
        if($request->has('to_date')){
            $data['to_date'] = $request->input('to_date');
        }else{
            $data['to_date'] = Carbon::now()->format('Y-m-d');
        }
        $data['students'] = $this->attendanceReport($data['from_date'], $data['to_date']);
        return view('attendance.daily_reports')->with($data);
    }


    public function attendanceReport($fromDate, $toDate)
    {
        $fromDate = Carbon::parse($fromDate)->format('Y-m-d');
        $toDate = Carbon::parse($toDate)->format('Y-m-d');
        $attendances = Student::with(['attendances' => function($q) use ($fromDate,$toDate) {
            $q->whereBetween('date',[$fromDate,$toDate]);
        }])->get();
        return $attendances;
    }


}