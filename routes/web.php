<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::resource('employee', EmployeeController::class);
Route::resource('project', ProjectController::class);
Route::resource('tache', TacheController::class);
