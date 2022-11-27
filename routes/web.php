<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;

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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/admin', function () {
    return view('admin');
});

Route::get('/colleges', function () {
    return view('college');
});

Route::get('/createCollege', function () {
    return view('createCollege');
}); 

});






