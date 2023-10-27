<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddsliderContoller;
use App\Http\Controllers\ProductsController;

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

Route::get('/admin',  [AdminController::class, 'admin']);

Route::get('/products',  [ProductsController::class, 'products']);
Route::get('/addproduct',  [ProductsController::class, 'addproduct']);

Route::get('/addcategory',  [CategoryController::class, 'addcategory']);
Route::get('/categories',  [CategoryController::class, 'category']);

Route::get('/addslider',  [AddsliderContoller::class, 'addslider']);
Route::get('/slider',  [AddsliderContoller::class, 'slider']);

Route::get('/',  [ClientController::class, 'home']);
Route::get('/shop',  [ClientController::class, 'shop']);
Route::get('/cart',  [ClientController::class, 'cart']);
Route::get('/checkout',  [ClientController::class, 'checkout']);
Route::get('/signin',  [ClientController::class, 'signin']);
Route::get('/signup',  [ClientController::class, 'signup']);
Route::get('/orders',  [ClientController::class, 'order']);
