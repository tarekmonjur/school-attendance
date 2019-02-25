<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19
 * Time: 10:48 AM
 */

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Setting;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
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


    public function storeAttendance(Request $request)
    {
        $deviceId = $request->input('device_id');
        $rfId = $request->input('rf_id');
        try {
            $student = Student::findStudent($deviceId, $rfId);
            if (!$student) {
                return $this->setJsonMessage('', 'error', 400, 'Error!', 'Student data not found.');
            }

            $toDay = date('Y-m-d');
            $attendance = Attendance::where('student_id', $student->id)
                ->where('date',$toDay)
                ->first();

            $settings = Setting::first();

            if ($attendance) {
                $inTime = date('H:i:s', strtotime($attendance->in_time));
                $outTime = date('H:i:s');
                $outTimeCarbon = Carbon::parse($outTime);
                $total_work_hour = $outTimeCarbon->diffInHours($inTime).'.'.$outTimeCarbon->diffInMinutes($inTime);
                $smsDurationMinutes = $outTimeCarbon->diffInRealMinutes($attendance->out_time);
                $smsDuration = $outTimeCarbon->diffInHours($attendance->out_time).'.'.(($smsDurationMinutes > 9)?$smsDurationMinutes:'0'.$smsDurationMinutes);

                $attendance->out_time = $outTime;
                $attendance->total_hour = $total_work_hour;
                $attendance->save();
                if ($settings && $settings->out_sms == 1 && $smsDuration > $settings->sms_duration) {
                    SmsController::sendSMS($student, $attendance);
                }
            } else {
                $attendance = new Attendance;
                $attendance->student_id = $student->id;
                $attendance->sid = $student->sid;
                $attendance->device_id = $deviceId;
                $attendance->rf_id = $student->rf_id;
                $attendance->date = date('Y-m-d');
                $attendance->in_time = date('H:i:s');
                $attendance->save();
                if ($settings && $settings->in_sms == 1) {
                    SmsController::sendSMS($student, $attendance);
                }
            }

            return $this->setJsonMessage($student, 'success', 200, 'Success!', 'Attendance successfully saved.');
        }catch (\Exception $e){
            return $this->setJsonMessage('', 'error', 500, 'Error!', 'Something was wrong.');
        }
    }


}