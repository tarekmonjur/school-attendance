<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19
 * Time: 11:30 AM
 */

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    public function getInTimeAttribute($value)
    {
        if(empty($value)) return '';
        return Carbon::parse($value)->format('h.i A');
    }


    public function getOutTimeAttribute($value)
    {
        if(empty($value)) return '';
        return Carbon::parse($value)->format('h.i A');
    }

}