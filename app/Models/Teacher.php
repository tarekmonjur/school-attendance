<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19
 * Time: 10:58 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";

    protected $primaryKey = 'em_id';

    public $timestamps = false;


    public static function findTeacher($deviceId, $rfId)
    {
        return Student::where('rf_id', $rfId)->first();
    }


    public function teacher_attendances()
    {
        return $this->hasMany(TeacherAttendances::class, 'teacher_id');
    }

}