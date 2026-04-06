<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Modules\user\src\http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by lthe RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('demo')->get('/user', function (Request $request) {
//     return config('user.config.test');
// });

// Route::middleware('demo')->get('/user',[UserController::class,'index']);

Route::group(['namespace' => 'Modules\Dashboard\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/','DashboardController@index')->name('dashboard.index');
    });
});