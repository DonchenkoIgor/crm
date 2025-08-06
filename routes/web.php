<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->prefix('dashboard')->group(function () {
   Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

   Route::middleware('can:manage-managers')->group(function () {
       Route::get('/managers', [\App\Http\Controllers\ManagerController::class, 'index'])->name('managers.index');
       Route::get('/managers/create', [\App\Http\Controllers\ManagerController::class, 'create'])->name('managers.create');
       Route::post('/managers', [\App\Http\Controllers\ManagerController::class, 'store'])->name('managers.store');
       Route::delete('/managers/{manager}', [\App\Http\Controllers\ManagerController::class, 'destroy'])->name('managers.destroy');
       Route::patch('/managers/{manager}', [\App\Http\Controllers\ManagerController::class, 'update'])->name('managers.update');
   });


});
