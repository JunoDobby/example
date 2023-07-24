<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/docs', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth'] , 'namespace'=>'App\Http\Controllers\Admin', 'prefix'=>'admin', 'as'=>'admin.'], function() {
    Route::group(['middleware' => ['can:admin']], function () {
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::get('/restore/{id}', [UserController::class, 'restore'])->name('restore');
    });

    Route::group(['middleware' => ['can:manager']], function () {
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
    });

    Route::group(['middleware' => ['can:developer']], function () {
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/store', [UserController::class, 'store'])->name('store');
    });

    Route::group(['middleware' => ['can:user']], function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
    });

    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
