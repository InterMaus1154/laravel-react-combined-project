<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

// hand over to react any missing route
Route::get('{any}', [ClientController::class, 'handover'])->where('any', '.*');
