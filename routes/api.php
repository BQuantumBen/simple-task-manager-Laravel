<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) { return $request->user();});
    Route::get('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    // Tasks

    Route::get('all-task', [\App\Http\Controllers\Api\TaskController::class, 'index']);
    Route::post('add-task', [\App\Http\Controllers\Api\TaskController::class, 'store']);
    Route::post('update-task/{id}', [\App\Http\Controllers\Api\TaskController::class, 'update']);
    Route::post('/mark-completed/{id}', [\App\Http\Controllers\Api\TaskController::class, 'updateAsCompleted']);
    Route::delete('delete-task/{id}', [\App\Http\Controllers\Api\TaskController::class, 'destroy']);


});


