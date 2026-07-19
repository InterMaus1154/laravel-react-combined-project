<?php

use App\Http\Controllers\Web\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;

Route::group([
    'controller' => AuthController::class,
    'as' => 'auth.',
    'prefix' => 'auth'],
    function () {

    Route::get('login', 'renderLogin')->name('login');
    Route::get('register')->name('register');

    Route::post('login', 'login')->name('login.action');
});

// hand over to react any missing route
Route::get('{any}', [ClientController::class, 'handover'])->where('any', '.*')->middleware('auth');
