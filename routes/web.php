<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontEndController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', [FrontEndController::class, 'home']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerPageUser']);
    Route::post('/register', [AuthController::class, 'registerUser']);
    Route::get('/login', [AuthController::class, 'loginPageUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
    Route::get('/loginAdmin', [AuthController::class, 'loginPageAdmin']);
    Route::post('/loginAdmin', [AuthController::class, 'loginAdmin']);
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logoutUser']);
    Route::post('/logoutAdmin', [AuthController::class, 'logoutAdmin']);
});
