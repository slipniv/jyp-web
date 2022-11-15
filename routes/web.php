<?php



use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\OngoingController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\LocationAPIController;
use App\Http\Controllers\MessageAPIController;
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

Route::get('storeLocation', [LocationAPIController::class,'store']);

Route::get('messages', [MessageAPIController::class,'index']);
Route::get('updateMessages/{id}', [MessageAPIController::class,'update']);

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('history', [HistoryController::class, 'index'])->name('history');
    Route::get('location', [LocationController::class, 'index'])->name('location');
    Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule');

    Route::get('ongoing', [OngoingController::class, 'index'])->name('ongoing');
    Route::post('updateSched/{id}', [OngoingController::class, 'update'])->name('updateSched');

    Route::get('completed', [CompletedController::class, 'index'])->name('completed');

    Route::get('archive', [TrashController::class, 'trash'])->name('trash');
    Route::get('restoreDriver/{id}', [TrashController::class, 'restore'])->name('restoreDriver');

    Route::get('drivers', [DriversController::class, 'index'])->name('drivers');
    Route::post('addDriver', [DriversController::class, 'add']);
    Route::post('updateDriver/{id}', [DriversController::class, 'update'])->name('updateDriver');
    Route::post('deleteDriver/{id}', [DriversController::class, 'delete'])->name('deleteDriver');

    Route::post('addSchedule', [ScheduleController::class, 'add']);
    Route::post('updateSchedule/{id}', [ScheduleController::class, 'update'])->name('updateSchedule');
    Route::post('deleteSchedule/{id}', [ScheduleController::class, 'delete'])->name('deleteSchedule');
    Route::post('sendMessage/{id}', [ScheduleController::class, 'send'])->name('sendSchedule');
});
