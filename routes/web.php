<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ReservationController::class,'index'])->name('index');
    Route::get('/history',  [ReservationController::class,'history'])->name('history');

    Route::get('/salle', [ReservationController::class,'salle'])->name('reserver');

    Route::get('/salle/{salle}/detail', [ReservationController::class,'detail'])->name('detail-salle');
});


Route::post('/submit',[\App\Http\Controllers\AuthController::class,'verifUser'])->name('traitementt-login');
Route::post('/inscription', [\App\Http\Controllers\AuthController::class,'inscription'])->name('inscription');
Route::get('/login',[\App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');


