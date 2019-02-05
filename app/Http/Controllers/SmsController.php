<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19
 * Time: 12:52 PM
 */

namespace App\Http\Controllers;


use App\Models\SmsLog;
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


    public function smsLogs()
    {
        $data['sms_logs'] = SmsLog::get();
        return view('dashboard.sms_logs')->with($data);
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