<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuspensionController;
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
Route::post('/login', [userController::class, 'login'])->name('user.login');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/admin', function () {
        return view('admin');
    });
    Route::get('/home', function () {
        return view('home');
    });


    Route::get('/colleges', [CollegeController::class, 'college_show']);
    Route::get('/colleges/{id}', [CollegeController::class, 'remove']);


    Route::get('/schools', [SchoolController::class, 'school_show']);
    Route::get('/schools/{id}', [SchoolController::class, 'remove']);
    Route::get('/schools/{id}/update', [SchoolController::class, 'update_show']);


    Route::get('/departments', [DepartmentController::class, 'department_show']);
    Route::get('/departments/{id}', [DepartmentController::class, 'remove']);

    Route::get('/programs', [ProgramController::class, 'program_show']);
    Route::get('/programs/{id}', [ProgramController::class, 'remove']);

    Route::get('/Students', [StudentController::class, 'student_show']);
    Route::get('/Students/{id}', [StudentController::class, 'remove']);

    Route::get('/Users', [userController::class, 'user_show']);
    Route::get('/users/{id}', [userController::class, 'removed']);
    Route::get('/users/{id}/update', [userController::class, 'update_show']);



    Route::get('/suspension', function () {
        return view('requestSuspension');
    });


    Route::get('/createCollege', function () {
        return view('createCollege');
    });

    Route::get('/createUser', [userController::class, 'user_create']);

    Route::get('/createSchool', [SchoolController::class, 'school_create']);
    Route::get('/createDepartment', [DepartmentController::class, 'department_create']);
    Route::get('/createProgram', [ProgramController::class, 'program_create']);
    Route::get('/createStudent', [StudentController::class, 'student_create']);





    /////////////////////////////////////////////////////


    Route::post('/suspension', [SuspensionController::class, 'store'])->name('suspension.request');
    Route::get('/progress', [SuspensionController::class, 'progress_show']);

    Route::get('/signup', [userController::class, 'signup_show']);
    Route::post('/signup', [userController::class, 'signup'])->name('user.signup');

   
    Route::post('/college/add', [CollegeController::class, 'store'])->name('college.add');
    Route::post('/user/add', [userController::class, 'store'])->name('user.add');

    Route::post("/user/update", [userController::class, 'updated'])->name('user.edit');
    Route::post('/school/add', [SchoolController::class, 'store'])->name('school.add');
    Route::post('/department/add', [DepartmentController::class, 'store'])->name('department.add');
    Route::post('/student/add', [StudentController::class, 'store'])->name('student.add');
    Route::post('/program/add', [ProgramController::class, 'store'])->name('program.add');
    Route::get("/colleges/{id}/update", [CollegeController::class, 'update_show']);
    Route::post("/colleges/update", [CollegeController::class, 'updated'])->name('college.edit');
    Route::post("/school/update", [SchoolController::class, 'updated'])->name('school.edit');
    Route::post('/logout', [userController::class, 'logout'])->name('logout');
});
