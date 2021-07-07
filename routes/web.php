<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassUserController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseSubjectController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('classes', ClassesController::class);
Route::resource('courses', CourseController::class);
Route::resource('classuser', ClassUserController::class);
Route::resource('faculties', FacultyController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('coursesubjects', CourseSubjectController::class);
Route::get('courses/search', [CourseController::class, 'search'])->name('search');
Route::get('subjects/search', [SubjectController::class, 'search'])->name('search');
Route::get('coursesubjects/search', [CourseSubjectController::class, 'search'])->name('search');