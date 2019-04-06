<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19 
 * Time: 10:58 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";

    public static function findStudent($deviceId, $rfId)
    {
        return Student::where('rf_id', $rfId)->first();
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}