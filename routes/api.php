<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/

 Route::post('login', 'API\UserController@login');
 Route::post('register', 'API\UserController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('patients', 'API\PatientController');

Route::get('/test', function() {
    return response()->json('hola');
});

