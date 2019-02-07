<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19
 * Time: 12:52 PM
 */

namespace App\Http\Controllers;


use App\Models\SmsLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $data['sms_logs'] = SmsLog::with('student')->get();
        return view('sms.logs')->with($data);
    }


    public static function sendSMS($student, $attendance)
    {
        if($student && $attendance){
            $msg = 'Hi '.ucfirst($student->name).', Attend on school at '.date('Y-m-d h:i:s');
            $response1 = SmsController::curlSmsSend($student->gsm, $msg);
            $smsLog = new SmsLog;
            $smsLog->student_id = $attendance->student_id;
            $smsLog->sid = $attendance->sid;
            $smsLog->device_id = $attendance->device_id;
            $smsLog->rf_id = $attendance->rf_id;
            $smsLog->date = date('Y-m-d');
            $smsLog->mobile_number = $student->gsm;
            $smsLog->body = $msg;
            $smsLog->response = $response1;

            if(stristr($response1, 'SMS SUBMITTED')){
                $smsLog->status = 'success';
            }else{
                $smsLog->status = 'not success';
            }
            $smsLog->save();
        }
        return true;
    }


    private function curlSmsSend($mobile_no, $message)
    {
        $api_key = 'C20011345a8d79457290c3.72336453';
        $contacts = $mobile_no; //sender number 88017xxxxx
        $senderId = '8804445629106';
        $msg = urlencode($message);
        $url = 'http://esms.dianahost.com/smsapi?api_key='.$api_key.'&type=text&contacts='.$contacts.'&senderid='.$senderId.'&msg='.$msg;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Sample cURL Request');
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }



}