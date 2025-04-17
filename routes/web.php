<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TransactionRecorderController;
use App\Http\Controllers\FundManagerController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function() {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', 'AdminUserController');
    Route::post('register', 'UserController@store')->name('admin.register');
    Route::resource('projects', 'AdminProjectController');
    Route::resource('clients', 'AdminClientController');
    Route::resource('funds', 'AdminFundController');
    Route::resource('employee_names', 'AdminEmployeeNameController');
    Route::get('project-report/{id}/', 'AdminPDFMaker@gen');
    Route::get('project-summary-report', 'AdminPDFMaker@generateProjectSummaryReport');
    Route::get('cheques-utilization-report/{id}/', 'AdminPDFMaker@chequesUtilizationReport');
    Route::get('disbursement-cheque-summary', 'AdminPDFMaker@disburseChequeSummary');
    Route::resource('/purchases', 'AdminPurchaseController');
    Route::resource('/cheques', 'AdminChequeController');
    Route::resource('/logs', 'AdminLogController');

});

Route::group(['prefix' => 'fund_manager', 'middleware' => ['isFundManager', 'auth']], function() {
    Route::get('dashboard', [FundManagerController::class, 'index'])->name('fund-manager.dashboard');
    Route::resource('projects', 'FundManagerProjectController');
    Route::get('project-report/{id}/', 'FundManagerPDFMaker@gen');
    Route::get('project-summary-report', 'FundManagerPDFMaker@generateProjectSummaryReport');
    Route::get('cheques-utilization-report/{id}/', 'FundManagerPDFMaker@chequesUtilizationReport');
    Route::get('disbursement-cheque-summary', 'FundManagerPDFMaker@disburseChequeSummary');
    Route::resource('clients', 'FundManagerClientController');
    Route::resource('funds', 'FundManagerFundController');
    Route::resource('employee_names', 'FundManagerEmployeeNameController');
    Route::resource('/logs', 'FundManagerLogsController');
    Route::resource('/cheques', 'FundManagerChequeController');
});

Route::group(['prefix' => 'transaction_recorder', 'middleware' => ['isTransactionRecorder', 'auth']], function() {
    Route::get('dashboard', [TransactionRecorderController::class, 'index'])->name('transaction-recorder.dashboard');
    Route::resource('/purchases', 'TransactionRecorderPurchaseController');
    Route::resource('/logs', 'TransactionRecorderLogsController');
});
