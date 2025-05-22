<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FunctionController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\SubjectController;
use App\Http\Controllers\Auth\TestController;
use App\Http\Controllers\Auth\ClassController;
use App\Http\Controllers\Auth\QuestionController;
use App\Http\Controllers\Auth\ResultController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\PaymentController;
use App\Exports\ResultUserExport;
use App\Exports\ListsUserExport;
use Maatwebsite\Excel\Facades\Excel;






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



Route::get('/login', [LoginController::class, 'showForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');


Route::get('/register', [RegisterController::class, 'showForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');



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
    Route::get('subject/create', [SubjectController::class, 'create'])->middleware('auth.admin')->name('admin.subject.create');
    Route::post('subject/store', [SubjectController::class, 'store'])->middleware('auth.admin')->name('admin.subject.store');
    Route::get('subject/edit/{id}', [SubjectController::class, 'edit'])->middleware('auth.admin')->name('admin.subject.edit')->where(['id' => '[0-9]+']);
    Route::post('subject/update/{id}', [SubjectController::class, 'update'])->middleware('auth.admin')->name('admin.subject.update')->where(['id' => '[0-9]+']);
    Route::get('subject/delete/{id}', [SubjectController::class, 'delete'])->middleware('auth.admin')->name('admin.subject.delete')->where(['id' => '[0-9]+']);
    Route::delete('subject/destroy/{id}', [SubjectController::class, 'destroy'])->middleware('auth.admin')->name('admin.subject.destroy')->where(['id' => '[0-9]+']);


});


Route::group(['prefix' => 'admin'], function() {
    Route::get('test', [TestController::class, 'index'])->middleware('auth.admin')->name('admin.test');
    Route::get('test/create', [TestController::class, 'create'])->middleware('auth.admin')->name('admin.test.create');
    Route::post('test/store', [TestController::class, 'store'])->middleware('auth.admin')->name('admin.test.store');
    Route::get('test/edit/{id}', [TestController::class, 'edit'])->middleware('auth.admin')->name('admin.test.edit')->where(['id' => '[0-9]+']);
    Route::post('test/update/{id}', [TestController::class, 'update'])->middleware('auth.admin')->name('admin.test.update')->where(['id' => '[0-9]+']);
    Route::get('test/delete/{id}', [TestController::class, 'delete'])->middleware('auth.admin')->name('admin.test.delete')->where(['id' => '[0-9]+']);
    Route::delete('test/destroy/{id}', [TestController::class, 'destroy'])->middleware('auth.admin')->name('admin.test.destroy')->where(['id' => '[0-9]+']);

    Route::get('test/{id}/list-test', [TestController::class, 'listQuestion'])->middleware('auth.admin')->name('admin.test.list-test');
    Route::get('test/{id}/assign-exam', [TestController::class, 'assignExam'])->middleware('auth.admin')->name('admin.test.assign-exam');
    Route::post('test/assign-exam/add', [TestController::class, 'addAssignExamToUser'])->middleware('auth.admin')->name('admin.test.assign-exam.to-user');


    Route::get('test/{id}/list-test/add', [TestController::class, 'addQuestionToTest'])->middleware('auth.admin')->name('admin.test.list-test.add-question');
    Route::post('test/list-test/add', [TestController::class, 'storeQuestionToTest'])->middleware('auth.admin')->name('admin.test.list-question.store-test');
    Route::delete('test/list-test/remove-by-id/{id}', [TestController::class, 'removeQuestionById'])->name('admin.class.list-test.remove-question-by-id');

});


Route::group(['prefix' => 'admin'], function() {
    Route::get('class', [ClassController::class, 'index'])->middleware('auth.admin')->name('admin.class');
    Route::get('class/{id}/list-class', [ClassController::class, 'listUser'])->middleware('auth.admin')->name('admin.class.list-class');
    
    Route::get('class/{id}/list-class/add', [ClassController::class, 'addStudentToClass'])->middleware('auth.admin')->name('admin.class.list-class.add-user');
    Route::post('class/list-class/add', [ClassController::class, 'storeStudentToClass'])->middleware('auth.admin')->name('admin.class.list-class.store-user');
    Route::delete('class/list-class/remove-by-mathanhvien/{maKhoi}/{maThanhVien}', [ClassController::class, 'removeStudent'])
    ->name('admin.class.list-class.remove-student');




    Route::get('class/create', [ClassController::class, 'create'])->middleware('auth.admin')->name('admin.class.create');
    Route::post('class/store', [ClassController::class, 'store'])->middleware('auth.admin')->name('admin.class.store');
    Route::get('class/edit/{id}', [ClassController::class, 'edit'])->middleware('auth.admin')->name('admin.class.edit')->where(['id' => '[0-9]+']);
    Route::post('class/update/{id}', [ClassController::class, 'update'])->middleware('auth.admin')->name('admin.class.update')->where(['id' => '[0-9]+']);
    Route::get('class/delete/{id}', [ClassController::class, 'delete'])->middleware('auth.admin')->name('admin.class.delete')->where(['id' => '[0-9]+']);
    Route::delete('class/destroy/{id}', [ClassController::class, 'destroy'])->middleware('auth.admin')->name('admin.class.destroy')->where(['id' => '[0-9]+']);


});

Route::group(['prefix' => 'admin'], function() {
    Route::get('question', [QuestionController::class, 'index'])->middleware('auth.admin')->name('admin.question');
    Route::get('question/create', [QuestionController::class, 'create'])->middleware('auth.admin')->name('admin.question.create');
    Route::post('question/store', [QuestionController::class, 'store'])->middleware('auth.admin')->name('admin.question.store');
    Route::get('question/edit/{id}', [QuestionController::class, 'edit'])->middleware('auth.admin')->name('admin.question.edit')->where(['id' => '[0-9]+']);
    Route::post('question/update/{id}', [QuestionController::class, 'update'])->middleware('auth.admin')->name('admin.question.update')->where(['id' => '[0-9]+']);
    Route::get('question/delete/{id}', [QuestionController::class, 'delete'])->middleware('auth.admin')->name('admin.question.delete')->where(['id' => '[0-9]+']);
    Route::delete('question/destroy/{id}', [QuestionController::class, 'destroy'])->middleware('auth.admin')->name('admin.question.destroy')->where(['id' => '[0-9]+']);


});


Route::group(['prefix' => 'admin'], function() {
    Route::get('result', [ResultController::class, 'index'])->middleware('auth.admin')->name('admin.result');
    Route::get('result/list/{id}/sub/{subject}', [ResultController::class, 'resultClassTest'])->name('admin.result.list')->where(['id' => '[0-9]+']);


});

Route::get('/export-result/{class}/{subject}', function ($classId, $subjectId) {
    return Excel::download(new ResultUserExport($classId, $subjectId), 'ket-qua-lop-' . $classId . '-mon-' . $subjectId . '.xlsx');
})->name('export.result');


Route::get('/export-classlist/{class}/', function ($classId) {
    return Excel::download(new ListsUserExport($classId), 'danh-sach-lop-' . $classId .'.xlsx');
})->name('export.list.class');




Route::get('/user', [ClientController::class, 'index'])->middleware('auth.user')->name('client.index');

Route::group(['prefix' => 'user'], function() {
    Route::get('information', [ClientController::class, 'viewInformation'])->middleware('auth.user')->name('user.information');
    Route::get('class', [ClientController::class, 'viewClass'])->middleware('auth.user')->name('user.class');
    Route::get('class/{id}/subject/{subject}/test', [ClientController::class, 'viewClassTest'])->middleware('auth.user')->name('user.class.test')->where(['id' => '[0-9]+']);
    Route::get('class/test/start/{id}', [ClientController::class, 'testStart'])->middleware('auth.user')->name('user.class.test.start')->where(['id' => '[0-9]+']);
    Route::get('class/test/take-test/{id}', [ClientController::class, 'takeTest'])->middleware('auth.user')->name('user.class.test.take-test')->where(['id' => '[0-9]+']);
    Route::get('class/test/{id}/success-test', [ClientController::class, 'successTest'])->name('user.class.test.success-test')->where(['id' => '[0-9]+']);

    Route::get('premium', [ClientController::class, 'viewPremium'])->middleware('auth.user')->name('user.premium');
    Route::post('premium/payment/vnpay/{id}', [PaymentController::class, 'createPayment'])->middleware('auth.user')->name('payment.vnpay');
    Route::get('premium/payment/vnpay/callback/{id}', [PaymentController::class, 'vnpayReturn'])->middleware('auth.user')->name('payment.vnpay.return');
    Route::get('premium/function', [ClientController::class, 'viewPremiumFunction'])->middleware('auth.user')->middleware('user.premium')->name('user.premium.function');
    
    
    
    Route::get('premium/function/list-test/', [ClientController::class, 'listTest'])->middleware('auth.user')->middleware('user.premium')->name('user.premium.function.list-test');
    
    
    Route::get('premium/function/result-list-test', [ClientController::class, 'resultListTestFalse'])->middleware('auth.user')->middleware('user.premium')->name('user.premium.function.result-list-test');




    Route::post('class/test/{id}/submit-test', [ClientController::class, 'submitTest'])->name('user.class.test.submit-test')->where(['id' => '[0-9]+']);


    Route::get('class/{id}/subject/{subject}/test-result', [ClientController::class, 'viewResultTest'])->middleware('auth.user')->name('user.class.test-result')->where(['id' => '[0-9]+']);
    Route::get('class/{idClass}/subject/{subject}/test-result/premium/{result}', [ClientController::class, 'resultListTest'])->middleware('auth.user')->middleware('user.premium')->name('user.class.test-result.premium')->where(['id' => '[0-9]+']);

});

