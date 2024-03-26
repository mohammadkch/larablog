<?php

use App\Http\Controllers\Dashboard\DashboardController;
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

Route::controller(\App\Http\Controllers\Auth\LoginRegisterController::class)->group(function (){
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
//    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('dashboard',  [DashboardController::class, 'index'])->name('dashboard');

Route::resource('post', \App\Http\Controllers\Dashboard\PostController::class);
Route::post('post/uploadImage', [\App\Http\Controllers\Dashboard\PostController::class, 'uploadImage']);
Route::resource('tag', \App\Http\Controllers\Dashboard\TagController::class);
