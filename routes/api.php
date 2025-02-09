<?php

use App\Http\Controllers\AddcourseController;
use App\Http\Controllers\Assingment;
use App\Http\Controllers\ModuleController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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
Route::get('/assingment/delete/{id}', [Assingment::class, 'deleteAssingment']);