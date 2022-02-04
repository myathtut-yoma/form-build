<?php

use App\Http\Controllers\v1\FormController;
use App\Http\Controllers\v1\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('create/form', [FormController::class, 'createForm']);
    Route::get('/form/{id}', [FormController::class, 'getForm']);
});
