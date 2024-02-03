<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\isikontencontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminAuth;
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

// Buat halaman home
Route::get('/home', [HomeController::class, 'index']);

// Halaman Login dan Logout
Route::get('/login', [AdminAuth::class, 'index'])->name('login');
Route::post('/login/do', [AdminAuth::class, 'doLogin']);
//Route::get('/logout', [AdminAuth::class, 'logout']);

// Grup rute yang membutuhkan autentikasi
Route::prefix('/admin')->middleware('auth')->group(function () {
    // Halaman Admin
        Route::get('/logout', [AdminAuth::class, 'logout']);
        //Route::get('/isikonten', [isikontencontroller::class, 'isikonten']);
        //Route::get('/adminuser', [AdminUserController::class, 'adminuser']);

        Route::resource('/isikonten', isikontencontroller::class);
        Route::resource('/adminuser', AdminUserController::class);

    
    });

