<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;


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



Auth::routes();
Route::get('/' , [HomeController::class , 'index'])->middleware('auth')->name('index');

Route::get('/users', [UserController::class , 'show_users'])->name('users');
Route::post('/register', [UserController::class , 'create_user']);


Route::get('/payments', [PaymentController::class , 'show_payments'])->name('payments');
Route::post('/payments', [PaymentController::class , 'create_payment']);
Route::get('/edit-payment/{id}' , [PaymentController::class , 'edit_payment']);
Route::post('/edit-payment/{id}' , [PaymentController::class , 'update']);
Route::get('/delete/{id}' , [PaymentController::class , 'delete']);


Route::get('/expenses', [ExpenseController::class , 'show_expenses'])->name('expenses');
Route::post('/expenses', [ExpenseController::class , 'add_expense'])->name('expenses');
Route::get('/edit-expense/{id}' , [ExpenseController::class , 'edit_expense']);
Route::post('/edit-expense/{id}' , [ExpenseController::class , 'update_expense']);
Route::get('/delete/{id}' , [ExpenseController::class , 'delete']);

// Expense Reports
Route::get('/reports/expense' , [ReportsController::class , 'show_expense_report'])->name('expense-report');

Route::get('/expense/month' , [ReportsController::class , 'show_month_expense'])->name('month-expense-report');
Route::get('/expense/week' , [ReportsController::class , 'show_week_expense'])->name('week-expense-report');
Route::get('/expense/day' , [ReportsController::class , 'show_day_expense'])->name('day-expense-report');

// Payment Reports


Route::get('/payment/{all}' , [ReportsController::class , 'show_payment_report'])->name('payment-report');

Route::get('/payment/month' , [ReportsController::class , 'show_month_payment'])->name('month-payment-report');
Route::get('/payment/week' , [ReportsController::class , 'show_week_payment'])->name('week-payment-report');
Route::get('/payment/day' , [ReportsController::class , 'show_day_payment'])->name('day-payment-report');