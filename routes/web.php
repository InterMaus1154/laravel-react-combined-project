<?php

use App\Http\Controllers\Web\ClientController;
use Illuminate\Support\Facades\Route;


// hand over to react any missing route
Route::get('{any}', [ClientController::class, 'handover'])->where('any', '.*')->middleware('auth');
