<?php

Route::group(['middleware' => ['web']], function () {
    $namespace = 'Modules\dashboard\src\Http\Controllers';

    Route::namespace($namespace)->group(function () {
        // Define your module routes here
        // Route::get('/', 'dashboardController@index');
    });
});
