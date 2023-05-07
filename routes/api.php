<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::resource('courses', App\Http\Controllers\API\CoursesAPIController::class);


Route::resource('quizzes', App\Http\Controllers\API\QuizAPIController::class);


Route::resource('videos', App\Http\Controllers\API\VideoAPIController::class);


Route::resource('sections', App\Http\Controllers\API\SectionAPIController::class);


Route::resource('sub_sections', App\Http\Controllers\API\SubSectionAPIController::class);


Route::resource('exames', App\Http\Controllers\API\ExamesAPIController::class);


Route::resource('uploads', App\Http\Controllers\API\UploadsAPIController::class);


Route::resource('course_lives', App\Http\Controllers\API\CourseLiveAPIController::class);


Route::resource('course_publiers', App\Http\Controllers\API\CoursePublierAPIController::class);
