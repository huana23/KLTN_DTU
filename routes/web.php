<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Middleware\AuthenticateUser;
use App\Http\Controllers\Auth\FunctionController;


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
    return view('layouts.home-page.index');
})->name('home-page');

Route::get('/admin', [FunctionController::class, 'index'])->middleware('auth.admin')->name('admin.dashboard');

Route::get('/user', function () {
    return view('layouts.client.index');
})->name('client.index')->middleware('auth.user');

Route::get('/login', [LoginController::class, 'showForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');


