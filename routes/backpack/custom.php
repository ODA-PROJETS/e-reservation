<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('users', 'UsersCrudController');
    Route::crud('salles', 'SallesCrudController');
    Route::crud('reservations', 'ReservationsCrudController');
    Route::crud('salles_has_users', 'Salles_has_usersCrudController');
    Route::crud('departements', 'DepartementsCrudController');
    Route::crud('status', 'StatusCrudController');
    Route::get('charts/weekly-reservation', 'Charts\WeeklyReservationChartController@response')->name('charts.weekly-reservation.index');
}); // this should be the absolute last line of this file