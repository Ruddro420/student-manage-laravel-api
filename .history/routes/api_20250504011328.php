<?php

use App\Http\Controllers\AddcourseController;
use App\Http\Controllers\Assingment;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//course
Route::get('/course/data', [AddcourseController::class, 'addCourseData']); 
Route::post('/course/add', [AddcourseController::class, 'addCourse']); 
Route::get('/course/delete/{id}', [AddcourseController::class, 'deleteCourse']);
Route::get('/course/show/{id}', [AddcourseController::class, 'showCourse']);

// module
Route::get('/module/data/{id}', [ModuleController::class, 'moduleData']);
Route::post('/module/add', [ModuleController::class, 'addModule']);
Route::get('/module/delete/{id}', [ModuleController::class, 'deleteModule']);

// assingment
Route::post('/assingment/add', [Assingment::class, 'add']);
Route::get('/assingment/data/{id}', [Assingment::class, 'assingData']);
Route::get('/assingment/specificData/{id}', [Assingment::class, 'specificAssingData']);
Route::get('/assingment/delete/{id}', [Assingment::class, 'deleteAssingment']);

// recording
Route::post('/recording/add', [RecordingController::class, 'add']);
Route::get('/recording/data/{id}', [RecordingController::class, 'recordingData']);
Route::get('/recording/specificData/{id}', [RecordingController::class, 'specificRecordData']);

// resources
Route::post('/resource/add', [ResourceController::class, 'add']);
Route::get('/resource/data/{id}', [ResourceController::class, 'resourceData']);
Route::get('/resource/specificData/{id}', [RecordingController::class, 'specificResourceData']);
// student register
Route::get('/account/data', [StudenController::class, 'accountData']);
Route::get('/student/data/{id}', [StudenController::class, 'getStudentData']);
Route::post('/create/account', [StudenController::class, 'createAccount']);
Route::get('/account/delete', [StudenController::class, 'accountDelete']);
Route::post('/login/account', [StudenController::class, 'loginAccount']);
// get student by batch and course id
Route::get('/student/data/show/{courseName}/{batchNo}', [StudenController::class, 'studentByCourseBatch']);
// check course
Route::get('/student/course/show/{courseName}/{batchNo}', [AddcourseController::class, 'studentShowCourse']);
// submit assingment
Route::post('/submit/assingment', [StudenController::class, 'submitAssingment']);
// get assingment data by student id
Route::get('/submit/assingment/data/{id}', [StudenController::class, 'getAssingmentData']);
// update student status active
Route::post('/student/update/status/{id}', [StudenController::class, 'updateStatus']);
// update student status active
Route::post('/student/update/pending/status/{id}', [StudenController::class, 'updatePendingStatus']);
// get student by ex_1
Route::get('/student/ex_1/{id}', [StudenController::class, 'getStudentEx1']);
// update marks and feedback by id
Route::post('/student/update/marks/{id}', [StudenController::class, 'updateMarks']);
// add student present and ansent into date
Route::post('/student/present/absent', [StudenController::class, 'presentAbsent']);
// total submit assingment by student id
Route::get('/student/total/assingment/{id}', [StudenController::class, 'totalAssingment']);
// total assingment by course name and batch no
Route::get('/student/total/assingment/course/{courseName}/{batchNo}', [StudenController::class, 'totalAssingmentByCourse']);
// total present and absent by student id
Route::get('/student/total/present/absent/{id}', [StudenController::class, 'totalPresentAbsent']);


