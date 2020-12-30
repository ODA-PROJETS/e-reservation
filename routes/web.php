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

    Route::get('/salle/detail/', [ReservationController::class,'detail'])->name('detailSalle');

    Route::get('/reservation/{reservation}/detail',[ReservationController::class,'detailReservation'])->name('detail_reservation');

    Route::get('/salle/{salle}/detail/{debut}/{fin}', [ReservationController::class,'detail'])->name('detail_salle');

    Route::post('/reservation', [ReservationController::class,'reservation'])->name('valideReservation');

    Route::get('/reservation-terminer',[ReservationController::class,'reservationOk'])->name('reservationOk');

    Route::get('/annuler/{reservation}',[ReservationController::class,'annuler'])->name('annuler');


});


Route::post('/submit',[\App\Http\Controllers\AuthController::class,'verifUser'])->name('traitementt-login');
Route::post('/inscription', [\App\Http\Controllers\AuthController::class,'inscription'])->name('inscription');
Route::get('/login',[\App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::get('/inscription-mobile', [\App\Http\Controllers\AuthController::class,'inscription_mobile'])->name('inscription_mobile');
