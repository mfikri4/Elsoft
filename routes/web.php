<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SwapController;
use App\Http\Controllers\ConvertController;

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

Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::prefix('user')->group(function(){
            Route::get('/', [PenggunaController::class, 'index']);
            Route::get('/create', [PenggunaController::class, 'create']);
            Route::post('/create', [PenggunaController::class, 'store']);
            Route::get('/edit/{id}', [PenggunaController::class, 'edit']);
            Route::get('/edit-pass/{id}', [PenggunaController::class, 'edit_pass']);
            Route::get('/show/{id}', [PenggunaController::class, 'show']);
            Route::post('/update/{id}', [PenggunaController::class, 'update']);
            Route::post('/update-pass/{id}', [PenggunaController::class, 'update_pass']);
            Route::get('/delete/{id}', [PenggunaController::class, 'destroy']);
    });
    Route::prefix('extra')->group(function(){
            Route::get('/', [HomeController::class, 'extra_soal']);
            Route::get('/swap', [SwapController::class, 'store']);
            Route::get('/convert', [ConvertController::class, 'store']);
    });
