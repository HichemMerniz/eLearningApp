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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::resource('courses', App\Http\Controllers\CoursesController::class);


Route::resource('quizzes', App\Http\Controllers\QuizController::class);


Route::resource('videos', App\Http\Controllers\VideoController::class);


Route::resource('sections', App\Http\Controllers\SectionController::class);


Route::resource('subSections', App\Http\Controllers\SubSectionController::class);


Route::resource('exames', App\Http\Controllers\ExamesController::class);


Route::resource('uploads', App\Http\Controllers\UploadsController::class);


Route::resource('courseLives', App\Http\Controllers\CourseLiveController::class);


Route::resource('coursePubliers', App\Http\Controllers\CoursePublierController::class);
