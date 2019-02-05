<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function setJsonMessage($data,$status,$code,$title,$message){
        $sendData['data'] = $data;
        $sendData['status'] = $status;
        $sendData['code'] = $code;
        $sendData['title'] = $title;
        $sendData['message'] = $message;
        return response()->json($sendData,200);
    }
}
