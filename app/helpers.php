<?php

use App\Models\Student;

/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/5/19
 * Time: 12:18 PM
 */

function session()
{
    return app('session');
}


function old($key)
{
    if (app('session')->has('old')) {
        $old = app('session')->get('old');
    } else {
        $old = [];
    }

    if (isset($old[$key])) {
        return $old[$key];
    }

    return '';
}


function errors($key)
{
    if (app('session')->has('errors')) {
        $errors = app('session')->get('errors');
    } else {
        $errors = [];
    }

    if (isset($errors[$key])) {
        return $errors[$key][0];
    }

    return '';
}


function getClassName()
{
    return ['Play','One', 'Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten'];
}


function getStudentId()
{
    $student = Student::orderBy('id', 'desc')->first();
    if($student){
        return $student->sid + 1;
    }
    return '0000001';
}