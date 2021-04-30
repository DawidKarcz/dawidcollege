<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CourseController as APICourseController;
use App\Http\Controllers\API\LecturerController as APILecturerController;
use App\Http\Controllers\API\EnrolmentController as APIEnrolmentController;

use App\Http\Controllers\API\PassportController as APIPassportController;

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

Route::post('register', [APIPassportController::class, 'register']);
Route::post('login', [APIPassportController::class, 'login']);
Route::delete('courses/{id}', [APIPassportController::class, 'destroy']);

Route::middleware('auth:api')->group(function () {

    Route::get('user', [APIPassportController::class, 'user']);
    Route::get('logout', [APIPassportController::class, 'logout']);

    Route::resource('courses', APICourseController::class)->except([

    ]);
    Route::resource('lecturers', APILecturerController::class)->except([

    ]);
    Route::resource('enrolments', APIEnrolmentController::class)->except([

    ]);
});
