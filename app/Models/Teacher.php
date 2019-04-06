<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19
 * Time: 10:58 AM
 */

namespace App\Models;
/*use App\Models\Teacher_attendances;*/
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";

    protected $primaryKey = 'em_id'; 

    public static function findTeacher($deviceId, $rfId)
    {
        return Student::where('rf_id', $rfId)->first();
    }

    public function teacher_attendances()
    {
        return $this->hasMany(Teacher_attendances::class, 'teacher_id');
    }

}