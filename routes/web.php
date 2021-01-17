<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;

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

//as controller is resource controller it can be directly called
Route::resource('/employee',employeeController::class);

Route::post('/store',[employeeController::class,'addData']);

Route::get('/edit/{id}',[employeeController::class,'editForm'])->name('form.edit');
