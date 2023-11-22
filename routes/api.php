<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterConroller;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\InstructorController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\ProgramCordinatorController;
use App\Http\Controllers\StudentController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login',[RegisterConroller::class,'login']);
Route::post('forgetpassword',[RegisterConroller::class,'forgetpassword']);
Route::get('students',[StudentController::class,'getStudentInfo']);

Route::post('register',[RegisterConroller::class,'register']);
Route::get('allstudents',[AdminController::class,'sindex']);
Route::post('studentsave',[AdminController::class,'screate']);
Route::get('studentedit/{id}',[AdminController::class,'sedit']);
Route::post('studentupdate/{id}',[AdminController::class,'supdate']);
Route::get('studentdelete/{id}',[AdminController::class,'sdelete']);
Route::get('allinstructor',[AdminController::class,'iindex']);
Route::post('instsave',[AdminController::class,'icreate']);
Route::get('instedit/{id}',[AdminController::class,'iedit']);
Route::post('instupdate/{id}',[AdminController::class,'iupdate']);
Route::get('instdelete/{id}',[AdminController::class,'idelete']);
Route::get('allqa',[AdminController::class,'qindex']);
Route::post('qasave',[AdminController::class,'qcreate']);
Route::get('qaedit/{id}',[AdminController::class,'qedit']);
Route::post('qaupdate/{id}',[AdminController::class,'qupdate']);
Route::get('qadelete/{id}',[AdminController::class,'qdelete']);
Route::get('profile',[InstructorController::class,'profile']);
Route::get('feedback',[InstructorController::class,'feedback']);
Route::get('grade',[InstructorController::class,'grades']);
// Route::delete('grade',[InstructorController::class,'grades']);
Route::get('managecourse',[QAController::class,'managecourse']);
Route::get('manageprogram',[QAController::class,'manageprogram']);

Route::post('addcourse',[QAController::class,'addcourse']);

Route::post('caccept/{id}',[QAController::class,'capprove']);
Route::post('creject/{id}',[QAController::class,'creject']);
Route::get('cdelete/{id}',[QAController::class,'cdelete']);
Route::post('addprogram',[QAController::class,'addprogram']);
Route::post('accept/{id}',[QAController::class,'approve']);
Route::post('reject/{id}',[QAController::class,'reject']);
Route::get('delete/{id}',[QAController::class,'delete']);
Route::post('addreport',[QAController::class,'addreport']);
Route::get('getreport',[QAController::class,'getreport']);
Route::get('rdelete/{id}',[QAController::class,'rdelete']);


Route::get('getperformance',[ProgramCordinatorController::class,'getstudent']);
Route::get('getins',[ProgramCordinatorController::class,'getins']);
Route::get('getqo',[ProgramCordinatorController::class,'getqo']);
Route::get('getadmin',[ProgramCordinatorController::class,'getadmin']);
Route::post('addperformance',[ProgramCordinatorController::class,'addstudent']);
Route::get('delins/{id}',[ProgramCordinatorController::class,'delins']);
Route::get('deladmin/{id}',[ProgramCordinatorController::class,'deladmin']);
Route::get('delqo/{id}',[ProgramCordinatorController::class,'delqo']);
Route::get('delstu/{id}',[ProgramCordinatorController::class,'delstu']);
Route::post('addnew',[ProgramCordinatorController::class,'addnew']);

Route::post('addreport',[ProgramCordinatorController::class,'addreport']);




