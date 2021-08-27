<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\BotManController;

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
    return view('home');
});

// Route::get('/login', 'LoginController@index');
Route::get('/home',[StudentController::class,'index']);


Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login']);

Route::get('/register', [RegistrationController::class,'index']);
Route::post('/register', [RegistrationController::class,'signup']);


Route::group(['middleware'=>['faculty']] , function(){
    Route::get('/facultyHome', [FacultyController::class,'index']);

});





