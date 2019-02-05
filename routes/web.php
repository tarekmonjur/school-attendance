<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*------------home directory*/

$router->get('/', 'HomeController@index');


/*==============for login controller*/

$router->post('/login','LoginController@admin_login');




 /*-==============dash board ===========*/
$router->get('/dashboard', 'HomeController@index');


/*===================student section*/
$router->get('/student', 'HomeController@student_data');
$router->get('/attedence', 'HomeController@attedence_chart');

 
$router->post('/_health', function () {
    return "tarek monjur";
});

$router->get('/_health', function () {
    return "tarek monjur";
});

$router->group(['prefix' => env('APP_API_VERSION')], function () use ($router) {
    $router->post('/attendances', 'ApiController@storeAttendance');
    $router->get('/attendances', 'ApiController@storeAttendance');
    $router->get('/attendances[/{student_id}]', 'ApiController@storeAttendance');
});

$router->get('/', 'HomeControler@index');

$router->get('/page', 'HomeControler@page');
