<?php

use App\Http\Controllers\Homepage\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/create', [UserController::class, 'create'])->name('create');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
Route::get('/restore/{id}', [UserController::class, 'restore'])->name('restore');
