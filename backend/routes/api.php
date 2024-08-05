<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserTrainingController;

// Rotas públicas
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

// Rotas protegidas
Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('trainings', TrainingController::class);
    Route::post('assign-training', [UserTrainingController::class, 'assign']);
    Route::patch('update-progress/{id}', [UserTrainingController::class, 'updateProgress']);
    Route::get('user-training/{id}', [UserTrainingController::class, 'show']);
    Route::get('user-trainings', [UserTrainingController::class, 'index']);
});