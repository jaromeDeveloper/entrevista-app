<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','studentsController@index');
Route::get('/list/students','studentsController@index'); // List Students
Route::get('/list/lessons','lessonsController@index');  // List lessons
Route::get('/relationship/assign', 'studentsLessonsController@index'); // List Relationship students with lessons
Route::post('/relationship/students/lessons/assign', 'studentsLessonsController@assign'); // Assign Relationship students with lessons
Route::post('/relationship/students/lessons/remove', 'studentsLessonsController@remove'); // Remove Relationship students with lessons
Route::post('/relationship/list/lessons/assign', 'studentsLessonsController@listLessonByStudent'); // List lesson by student