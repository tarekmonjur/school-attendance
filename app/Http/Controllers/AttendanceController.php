<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if ($request->has('from_date')) {
            $data['from_date'] = $request->input('from_date');
        } else {
            $data['from_date'] = Carbon::now()->startOfMonth()->format('Y-m-d');

        }
        if ($request->has('to_date')) {
            $data['to_date'] = $request->input('to_date');
        } else {
            $data['to_date'] = Carbon::now()->format('Y-m-d');
        }

         $data['class_name'] = $request->input('class_name');
         $data['class_section'] = $request->input('class_section');

         $data['classes']  = DB::table('classname')->get();
         $data['sectiones']  = DB::table('section')->get();

        $data['students'] = $this->dailyAttendanceReport($data['class_name'],$data['class_section'],$data['from_date'], $data['to_date']);

        return view('attendance.daily_reports')->with($data);
    }


    protected function dailyAttendanceReport($class_name,$section,$fromDate, $toDate)
    {
        $fromDate = Carbon::parse($fromDate)->format('Y-m-d');
        $toDate = Carbon::parse($toDate)->format('Y-m-d');
        $attendances = Student::with([
            'attendances' => function ($q) use ($fromDate, $toDate) {
                $q->whereBetween('date', [$fromDate, $toDate]);
            },
        ])
        ->where('classname', $class_name)
        ->where('section', $section)
        ->get();

        return $attendances;
    }


    protected function monthlyAttendanceReport($fromDate, $toDate)
    {
        $fromDate = Carbon::parse($fromDate)->format('Y-m-d');
        $toDate = Carbon::parse($toDate)->format('Y-m-d');
        $attendances = Student::with([
            'attendances' => function ($q) use ($fromDate, $toDate) {
                $q->select('student_id', DB::raw("date_format(date, '%Y-%m') as date"), DB::raw('count(date) as total'))
                    ->whereBetween('date', [$fromDate, $toDate])
                    ->groupBy('student_id', DB::raw("date_format(date, '%Y-%m')"));
            },
        ])->get();

        return $attendances;
    }


    public function monthlyAttendance(Request $request)
    {
        $data = [];
        if ($request->has('from_date')) {
            $data['from_date'] = $request->input('from_date');
        } else {
            $data['from_date'] = Carbon::now()->subMonth(1)->format('Y-m');
        }
        $formDate = Carbon::parse($data['from_date'])->format('Y-m-d');
        if ($request->has('to_date')) {
            $data['to_date'] = $request->input('to_date');
        } else {
            $data['to_date'] = Carbon::now()->format('Y-m');
        }
        $toDate = Carbon::parse($data['to_date'])->addDays(Carbon::parse($data['to_date'])->daysInMonth - 1)->format('Y-m-d');
        $data['students'] = $this->monthlyAttendanceReport($formDate, $toDate);

        return view('attendance.monthly_reports')->with($data);
    }


}