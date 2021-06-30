<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\ScoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
// return $request->user();
// });

// Route::group(['middleware => auth:sanctum'], function () {
// 	Route::get('/form', [FormController::class, 'index']);
// 	Route::get('/logout', [AuthController::class, 'logout']);
// });

//* route crud student
Route::post('/create', [FormController::class, 'create'])->middleware('auth:sanctum');
Route::get('/edit/{id}', [FormController::class, 'edit'])->middleware('auth:sanctum');
Route::post('/edit/{id}', [FormController::class, 'update'])->middleware('auth:sanctum');
Route::get('/delete/{id}', [FormController::class, 'delete'])->middleware('auth:sanctum');

//* route crud score with relation to student
Route::post('/create-score-student', [ScoreController::class, 'create'])->middleware('auth:sanctum');


//* route logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



//* route outside authentication
Route::post('/login', [AuthController::class, 'login']);
