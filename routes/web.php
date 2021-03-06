<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TransactionController;

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
Route::get('/search', [FrontEndController::class, 'search']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerPageUser']);
    Route::post('/register', [AuthController::class, 'registerUser']);
    Route::get('/login', [AuthController::class, 'loginPageUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
    Route::get('/loginAdmin', [AuthController::class, 'loginPageAdmin']);
    Route::post('/loginAdmin', [AuthController::class, 'loginAdmin']);
});
Route::middleware('user')->group(function () {
    Route::post('/logout', [AuthController::class, 'logoutUser']);
    Route::get('/cart', [FrontEndController::class, 'cart']);
    Route::get('/cart/{property}/add', [TransactionController::class, 'addToCart']);
    Route::get('/cart/{property}/remove', [TransactionController::class, 'removeFromCart']);
    Route::get('/checkout', [TransactionController::class, 'checkout']);
});
Route::middleware('userAndGuest')->group(function () {
    Route::get('/aboutUs', [FrontEndController::class, 'aboutUs']);
    Route::get('/rent', [FrontEndController::class, 'rent']);
    Route::get('/buy', [FrontEndController::class, 'buy']);
});
Route::middleware('admin')->group(function () {
    Route::resource('/offices', OfficeController::class);
    Route::resource('/properties', PropertyController::class);
    Route::get('/properties/{property}/finish', [TransactionController::class, 'finishTransaction']);
    Route::post('/logoutAdmin', [AuthController::class, 'logoutAdmin']);
});
