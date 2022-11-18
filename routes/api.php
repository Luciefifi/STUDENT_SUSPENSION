<?php

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
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

// Route::post('/students',[StudentController::class,'store']);
// Route::patch('/students/{id}',[StudentController::class,'update']);
// Route::get('/students/{id}',[StudentController::class,'show']);
// Route::delete('/students/{id}',[StudentController::class,'destroy']);

Route::post('/user/signup', [UserController::class, 'store']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('/students', StudentController::class);
    // Route::resource('/colleges', CollegeController::class);
    Route::resource('/schools', SchoolController::class);
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/programs', ProgramController::class);

    Route::post('/student/signup', [UserController::class, 'store_student']);
    Route::post('/colleges',[CollegeController::class,'store']);
    Route::post('/schools' ,[SchoolController::class,'store']);
});
