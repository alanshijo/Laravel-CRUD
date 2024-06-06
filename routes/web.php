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
Route::group([
    'controller' => AuthController::class
], function(){
    Route::group([
        'prefix' => '/'
    ], function(){
        Route::get('login',  'login')->name('login');
        Route::post('logout',  'logout')->name('logout');
        Route::get('register',  'register')->name('register');
    });
    
    Route::group([
        'prefix' => '/users'
    ], function(){
        Route::post('create',  'create')->name('user.create');
        Route::post('authenticate',  'authenticate')->name('authenticate');
    });
});

Route::group([
    'controller' => EmployeeController::class,
], function(){
    Route::get('/',  'index')->name('employee.listing');
    Route::get('/employees/{employee}',  'view')->name('employee.view');
    
    Route::group([
        'middleware' => ['auth']
    ], function(){

        Route::group([
            'prefix' => '/employee'
        ], function(){
            Route::get('create', 'create')->name('employee.create');
            Route::post('/',  'store')->name('employee.store');
        });

        Route::group([
            'prefix' => '/employees'
        ], function(){
            Route::get('{employee}/edit',  'edit')->name('employee.edit');
            Route::put('{employee}',  'update')->name('employee.update');
            Route::delete('{employee}',  'destroy')->name('employee.destroy');
    
        });
    });
});







