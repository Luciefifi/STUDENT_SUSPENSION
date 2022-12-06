<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SchoolController;

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

//Route::get('/', function () {
    //return view('index1');
//});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function(){
//     return view('index');
// });

// Route::get('/', [loginController::class, 'login']);
// 




Route::get('/login', function () {
    return view('login');
    
})->name('login');

Route::get('/registerStudent', function () {
    return view('registerStudent');
});

Route::post('/login',[userController::class,'login'])->name('user.login');
Route::post('/college/add',[CollegeController::class,'store'])->name('college.add');
Route::post('/school/add',[SchoolController::class,'store'])->name('school.add');
Route::post('/department/add',[DepartmentController::class,'store'])->name('department.add');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/admin', function () {
    return view('admin');
});


Route::get('/colleges',[CollegeController::class,'college_show']);
Route::get('/colleges/{id}',[CollegeController::class,'remove']);


Route::get('/schools',[SchoolController::class,'school_show']);
Route::get('/schools/{id}',[SchoolController::class,'remove']);


Route::get('/departments',[DepartmentController::class,'department_show']);


Route::get('/createCollege', function () {
    return view('createCollege');
}); 

Route::get('/createSchool',[SchoolController::class,'school_create']);
Route::get('/createDepartment',[DepartmentController::class,'department_create']);

Route::get('/departments', function () {
    return view('departments');
}); 

Route::get('/createDepartment', function () {
    return view('createDepartment');
}); 

Route::get('/programs', function () {
    return view('programs');
}); 

Route::get('/createProgram', function () {
    return view('createProgram');
}); 


Route::get('/Students', function () {
    return view('Students');
}); 

Route::get('/createStudent', function () {
    return view('createStudent');
}); 

Route::get('/Users', function () {
    return view('Users');
}); 

Route::get('/createUser', function () {
    return view('createUser');
}); 



});






