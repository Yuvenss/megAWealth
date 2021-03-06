<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
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


Route::prefix('v1')->group(function () {
    Route::post('/register', [APIController::class, 'registerUser']);
    Route::post('/login', [APIController::class, 'loginUser']);
    Route::post('/transaction', [APIController::class, 'transaction'])->middleware('auth:api');

    Route::middleware('auth:api')->get('/transaction', function () {
        return "test";
    });
});
