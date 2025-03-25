<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Middleware\AuthenticateUser;
use App\Http\Controllers\Auth\FunctionController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\SubjectController;
use App\Http\Controllers\Auth\TestController;


use App\Models\Subject;

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


Route::group(['prefix' => 'admin'], function() {
    Route::get('user', [UserController::class, 'index'])->middleware('auth.admin')->name('admin.user');
    Route::get('user/create', [UserController::class, 'create'])->middleware('auth.admin')->name('admin.user.create');
    Route::post('user/store', [UserController::class, 'store'])->middleware('auth.admin')->name('admin.user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->middleware('auth.admin')->name('admin.user.edit')->where(['id' => '[0-9]+']);
    Route::post('user/update/{id}', [UserController::class, 'update'])->middleware('auth.admin')->name('admin.user.update')->where(['id' => '[0-9]+']);
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->middleware('auth.admin')->name('admin.user.delete')->where(['id' => '[0-9]+']);
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->middleware('auth.admin')->name('admin.user.destroy')->where(['id' => '[0-9]+']);


});

Route::group(['prefix' => 'admin'], function() {
    Route::get('subject', [SubjectController::class, 'index'])->middleware('auth.admin')->name('admin.subject');
    // Route::get('user/create', [UserController::class, 'create'])->middleware('auth.admin')->name('admin.user.create');
    // Route::post('user/store', [UserController::class, 'store'])->middleware('auth.admin')->name('admin.user.store');
    // Route::get('user/edit/{id}', [UserController::class, 'edit'])->middleware('auth.admin')->name('admin.user.edit')->where(['id' => '[0-9]+']);
    // Route::post('user/update/{id}', [UserController::class, 'update'])->middleware('auth.admin')->name('admin.user.update')->where(['id' => '[0-9]+']);
    // Route::get('user/delete/{id}', [UserController::class, 'delete'])->middleware('auth.admin')->name('admin.user.delete')->where(['id' => '[0-9]+']);
    // Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->middleware('auth.admin')->name('admin.user.destroy')->where(['id' => '[0-9]+']);


});


Route::group(['prefix' => 'admin'], function() {
    Route::get('test', [TestController::class, 'index'])->middleware('auth.admin')->name('admin.test');
    Route::get('test/create', [TestController::class, 'create'])->middleware('auth.admin')->name('admin.test.create');
    Route::post('test/store', [TestController::class, 'store'])->middleware('auth.admin')->name('admin.test.store');
    // Route::get('test/edit/{id}', [TestController::class, 'edit'])->middleware('auth.admin')->name('admin.test.edit')->where(['id' => '[0-9]+']);
    // Route::post('test/update/{id}', [TestController::class, 'update'])->middleware('auth.admin')->name('admin.test.update')->where(['id' => '[0-9]+']);
    // Route::get('test/delete/{id}', [TestController::class, 'delete'])->middleware('auth.admin')->name('admin.test.delete')->where(['id' => '[0-9]+']);
    // Route::delete('test/destroy/{id}', [TestController::class, 'destroy'])->middleware('auth.admin')->name('admin.test.destroy')->where(['id' => '[0-9]+']);
                            

});
