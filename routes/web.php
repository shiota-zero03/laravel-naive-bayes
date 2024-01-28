<?php

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
Route::controller(\App\Http\Controllers\AuthController::class)->group(function(){
    Route::get('/', function () { return view('auth.login'); })->name('login');
    Route::post('/', 'login')->name('login.process');
    Route::get('/logout', 'logout')->name('logout.process');
});
Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function(){
    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function(){
        Route::get('/', 'index')->name('home');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/visitor-json', 'visitorJson')->name('visitor.json');
    });
    Route::controller(\App\Http\Controllers\Admin\UserController::class)->name('management.')->prefix('/admin-management')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/json', 'json')->name('json');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/update', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });
    Route::prefix('/data-set')->group(function(){
        Route::controller(\App\Http\Controllers\Admin\DataSet\TrainingDataController::class)->name('training.')->prefix('/training')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/count', 'count')->name('count');
            Route::get('/json', 'json')->name('json');
            Route::get('/export', 'export')->name('export');
            Route::get('/delete', 'delete')->name('delete');
        });
        Route::controller(\App\Http\Controllers\Admin\DataSet\TestingDataController::class)->name('testing.')->prefix('/testing')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/json', 'json')->name('json');
            Route::get('/count', 'count')->name('count');
            Route::get('/export', 'export')->name('export');
            Route::get('/delete', 'delete')->name('delete');
        });
    });
    Route::prefix('/naive-bayes')->group(function(){
        Route::controller(\App\Http\Controllers\Admin\NaiveBayes\ProbabilityController::class)->name('probability.')->prefix('/training')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/store', 'store')->name('store');
        });
        Route::controller(\App\Http\Controllers\Admin\NaiveBayes\KlasifikasiController::class)->name('classification.')->prefix('/klasifikasi')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/json', 'json')->name('json');
            Route::get('/store', 'store')->name('store');
        });
    });
    Route::controller(\App\Http\Controllers\Admin\PerformController::class)->name('perform.')->prefix('/performa')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/profile', 'update')->name('admin.profile.update');
    });
    Route::controller(\App\Http\Controllers\Admin\ProfileController::class)->name('profile.')->prefix('/profil')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'update')->name('update');
    });
});