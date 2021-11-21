<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


#==========  CALLING CONTROLLER PATIENT =========


#membuat route getAll
Route::get('/patients',[
    PatientController::class,'getAll'
]);

#membuat route createData
Route::post('/patients',[
    PatientController::class,'createData'
]);

#membuat route getById
Route::get('/patients/{id}',[
    PatientController::class,'getById'
]);

#membuat route updateData
Route::put('/patients/{id}',[
    PatientController::class,'updateData'
]);

#membuat route deleteData
Route::delete('/patients/{id}',[
    PatientController::class,'deleteData'
]);

#membuat route getByName
Route::get('/patients/search/{name}',[
    PatientController::class,'getByName'
]);

#membuat route getStatusPositive
Route::get('/patients/status/positive',[
    PatientController::class,'getStatusPositive'
]);


#membuat route getStatusRecovered
Route::get('/patients/status/recovered',[
    PatientController::class,'getStatusRecovered'
]);


#membuat route getStatusDead
Route::get('/patients/status/dead',[
    PatientController::class,'getStatusDead'
]);



