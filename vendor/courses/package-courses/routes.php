<?php

use Illuminate\Session\TokenMismatchException;
use Courses\Courses\Controllers\Admin\CoursesAdminController;

// Route::get('login', [Courses\Courses\Controllers\UserController::class, 'index'])->name('login.form');
// Route::post('log', [Courses\Courses\Controllers\UserController::class, 'login'])->name('login'); 
Route::get('logout', [Courses\Courses\Controllers\UserController::class, 'logout'])->name('logout');

//profile
Route::get('profile', [Courses\Courses\Controllers\UserController::class, 'profile'])->name('profile'); 

//register
Route::get('registration', [Courses\Courses\Controllers\UserController::class, 'registration'])->name('register');
Route::post('regist', [Courses\Courses\Controllers\UserController::class, 'regist'])->name('regist');

//courses
Route::get('courses', [Courses\Courses\Controllers\CoursesController::class, 'index'])->name('courses');

//create courses
Route::get('courses/create', [Courses\Courses\Controllers\CoursesController::class, 'create'])->name('course.create');
Route::post('courses/cr', [Courses\Courses\Controllers\CoursesController::class, 'createDiary'])->name('course.store');

//update diary
Route::get('courses/update', [Courses\Courses\Controllers\CoursesController::class, 'edit'])->name('course.edit');
Route::post('courses/ud', [Courses\Courses\Controllers\CoursesController::class, 'update'])->name('course.update');


//delete diary
Route::get('courses/delete', [Courses\Courses\Controllers\CoursesController::class, 'delete'])->name('course.delete');