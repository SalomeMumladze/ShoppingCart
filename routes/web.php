<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [ClientController::class, 'home']);
Route::get('/shop',  [ClientController::class, 'shop']);
Route::get('/cart',  [ClientController::class, 'cart']);
Route::get('/checkout',  [ClientController::class, 'checkout']);
Route::get('/signin',  [ClientController::class, 'signin']);
Route::get('/signup',  [ClientController::class, 'signup']);
