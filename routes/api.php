<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
   return response()->json([
       'message' => 'Hello from the API'
   ]);
});

Route::group(['controller' => AuthController::class], function(){

    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');

});

Route::middleware('auth:sanctum')->group(function (){

    Route::get('/me', function(Request $request){
       return response()->json($request->user());
    });

    Route::apiResource('todos', TodoController::class);
    Route::patch('/todos/{id}/restore', [TodoController::class, 'restore']);
    Route::patch('/todos/{id}/toggle', [TodoController::class, 'toggle']);

    Route::controller(\App\Http\Controllers\Api\CategoryController::class)->group(function(){
       Route::get('/categories', 'index');
       Route::get('/categories/{id}', 'show');
    });
});

