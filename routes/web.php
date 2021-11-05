<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('dashboard');
});


Route::resource('tasks', TaskController::class);
// Route::resource('userTasks', DashboardController::class);
Route::get('/dash/{id}', [DashboardController::class,'userTasks'])->name('userTasks.index');
Route::get('/dash/{id}/create', [DashboardController::class,'createUserTasks'])->name('userTasks.create');
Route::post('/dash/{id}/', [DashboardController::class,'store'])->name('userTasks.store');
Route::get('/dash/{id}/edit/{taskID}', [DashboardController::class,'edit'])->name('userTasks.edit');
Route::put('/dash/{id}/', [DashboardController::class,'update'])->name('userTasks.update');
Route::delete('/dash/{id}/', [DashboardController::class,'destroy'])->name('userTasks.destroy');