<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ScheduleController;
use App\Models\Drivers;
use App\Models\Schedule;
use App\Models\Location;
  

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
    Route::get('history', [HistoryController::class, 'index'])->name('history');
    Route::get('location', [LocationController::class, 'index'])->name('location');
    Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('drivers', [DriversController::class, 'index'])->name('drivers');
    Route::post('addDriver', [DriversController::class, 'add']);
    Route::post('updateDriver/{id}', [DriversController::class, 'update'])->name('updateDriver');
    Route::post('deleteDriver/{id}', [DriversController::class, 'delete'])->name('deleteDriver');
    Route::post('addSchedule', [ScheduleController::class, 'add']);
    Route::post('updateSchedule/{id}', [ScheduleController::class, 'update'])->name('updateSchedule');
    Route::post('deleteSchedule/{id}', [ScheduleController::class, 'delete'])->name('deleteSchedule');
});
