<?php

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


Route::get('ghada', [App\Http\Controllers\MainController::class, 'index']);

Route::get('login', [App\Http\Controllers\MainController::class, 'login'])->name('login_user');
Route::post('login', [App\Http\Controllers\MainController::class, 'login_post']);

Route::get('register', [App\Http\Controllers\MainController::class, 'register'])->name('new_user');
Route::post('register', [App\Http\Controllers\MainController::class, 'register_post']);

Route::get('home', [App\Http\Controllers\MainController::class, 'home'])->name('home');
Route::post('home', [App\Http\Controllers\MainController::class, 'home_post']);

Route::get('edit', [App\Http\Controllers\MainController::class, 'edit']);
Route::post('edit', [App\Http\Controllers\MainController::class, 'edit_post']);

Route::get('edit_hr', [App\Http\Controllers\MainController::class, 'edit_hr']);

Route::get('/account_active/{id}', [App\Http\Controllers\MainController::class, 'account_active_hr']);
Route::get('/request_card/{id}/{status}', [App\Http\Controllers\MainController::class, 'request_card_hr']);
Route::get('/request_card_hr_manager/{id}/{status}', [App\Http\Controllers\MainController::class, 'request_card_hr_manager']);

Route::get('export_verifying_account_hr', [App\Http\Controllers\MainController::class, 'export_verifying_account_hr']);
Route::get('export_card_request_hr', [App\Http\Controllers\MainController::class, 'export_card_request_hr']);

Route::get('export_employee_pdf_card', [App\Http\Controllers\MainController::class, 'export_employee_pdf_card']);

Route::get('download_employee_pdf_card/{id}', [App\Http\Controllers\MainController::class, 'download_employee_pdf_card']);
