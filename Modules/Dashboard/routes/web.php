<?php

Route::group(['middleware' => ['web']], function () {
    $namespace = 'Modules\dashboard\src\Http\Controllers';

    Route::namespace($namespace)->group(function () {
        Route::prefix('admin')->group(function () {
        Route::prefix('/')->group(function(){
            Route::get('/', 'DashboardController@index')->name('users.index');
        });
    });
    });
});
