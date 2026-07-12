<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::group(['controller' => AuthController::class], function(){

    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');

});

Route::middleware('auth:sanctum')->group(function (){

    Route::get('/me', function(Request $request){
       return response()->json($request->user());
    });

});

