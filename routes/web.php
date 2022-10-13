<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
  

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

  
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('history', [DashboardController::class, 'history'])->name('history');
    Route::get('location', [DashboardController::class, 'loc'])->name('location');
    Route::get('schedule', [DashboardController::class, 'sched'])->name('schedule');
});
