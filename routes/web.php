<?php

use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/users/create', [AuthController::class, 'create']);

Route::post(('/users/authenticate'), [AuthController::class, 'authenticate']);

Route::get('/', [EmployeeController::class, 'index'])->name('employee.listing');

Route::get('/employee/create', [EmployeeController::class, 'create'])->middleware('auth');

Route::post('/employee', [EmployeeController::class, 'store'])->middleware('auth');

Route::get('/employees/{employee}', [EmployeeController::class, 'view']);

Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->middleware('auth');

Route::put('employees/{employee}', [EmployeeController::class, 'update'])->middleware('auth');

Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->middleware('auth');
