<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\updateEmployee;
use App\Http\Controllers\emp;
use App\Http\Controllers\deleteEmployee;
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
Route::get('/employee',[emp::class,'index']);

Route::post('/store',[emp::class,'addData']);

Route::post('abc',[updateEmployee::class,'updateData']);

Route::get('/edit/{id}',[emp::class,'goEditForm'])->name('form.edit');

Route::get('/delete/{id}',[emp::class,'delete'])->name('delete');


