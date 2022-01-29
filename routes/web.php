<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginAndLogoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration');

Route::get('/login', [LoginAndLogoutController::class, 'index'])->name('login');
Route::post('/login', [LoginAndLogoutController::class, 'login'])->name('login');
Route::post('/logout', [LoginAndLogoutController::class, 'logout'])->name('logout');

Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/users', [AdminController::class, 'showusers'])->name('admin.showusers');
    Route::post('/deleteuser/{id}', [AdminController::class, 'deleteuser'])->name('admin.deleteuser');

    Route::name('admin.')->group(function () {
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    });

    Route::name('admin.')->group(function () {
        Route::resource('comment', \App\Http\Controllers\Admin\CommentController::class);
    });
});


