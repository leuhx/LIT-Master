<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    //Route::resource('/users', App\Http\Controllers\Admin\UsersController::class, ['except' => ['show', 'create', 'store']]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/departments', App\Http\Controllers\Admin\DepartmentController::class, ['except' => ['show']]);
    Route::resource('/services', App\Http\Controllers\Admin\ServiceController::class, ['except' => ['show']]);
});
