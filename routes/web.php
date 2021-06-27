<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;
use App\Http\Middleware;

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


Route::group(['middleware' => ['ProtectedPages']], function(){    
Route::view('add','studentadd');
Route::post('addstudent',[StudentController::class,'add']);
Route::get('studentlist',[StudentController::class,'list']);
Route::get('edit/{id}',[StudentController::class,'edit']);
Route::PUT('/editstudent',[StudentController::class,'update']);
Route::get('/delete{id}',[StudentController::class,'delete']);
Route::view('/','auth.signin');
Route::view('signup','auth.signup');
//logout page
Route::get('logout',[LoginController::class,'logout']);
});

    //signin page with validation if user is already login then it will redirect on home page--  
    // Route::get('/', function () {
    //     if(session()->has('loggeduser')){
    //         return redirect('studentlist');
    //     }
    //     return view('auth.signin');
    // });
    Route::post('usersignin',[LoginController::class,'usersignin']);

    //signup page   
    Route::post('usersignup',[RegisterController::class,'usersignup']);


        
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
