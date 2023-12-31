<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddsliderContoller;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PdfController;

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

Route::get('/dashboard',  [AdminController::class, 'dashboard']);

Route::get('/products',  [ProductsController::class, 'products']);
Route::get('/addproduct',  [ProductsController::class, 'addproduct']);
Route::get('/edit_product/{id}',  [ProductsController::class, 'edit_product']);
Route::post('/saveproduct', 'App\Http\Controllers\ProductsController@saveproduct')->name('saveproduct');
Route::post('/updateproduct', 'App\Http\Controllers\ProductsController@updateproduct')->name('updateproduct');
Route::get('/deleteproduct/{id}',  [ProductsController::class, 'deleteproduct']);
Route::get('/activate_product/{id}',  [ProductsController::class, 'activate_product']);
Route::get('/Unactivate_product/{id}',  [ProductsController::class, 'Unactivate_product']);
Route::get('/view_product_by_category/{category_name}',  [ProductsController::class, 'view_product_by_category']);

Route::get('/addcategory',  [CategoryController::class, 'addcategory']);
Route::get('/categories',  [CategoryController::class, 'category']);
Route::get('/savecategory',  [CategoryController::class, 'savecategory']);
Route::get('/edit_category/{id}',  [CategoryController::class, 'editcategory']);
Route::get('/updatecategory',  [CategoryController::class, 'updatecategory']);
Route::get('/delete_category/{id}',  [CategoryController::class, 'deletecategory']);

Route::get('/addslider',  [AddsliderContoller::class, 'addslider']);
Route::get('/sliders',  [AddsliderContoller::class, 'sliders']);
Route::get('/activate_slider/{id}',  [AddsliderContoller::class, 'activate_slider']);
Route::get('/Unactivate_slider/{id}',  [AddsliderContoller::class, 'Unactivate_slider']);
Route::post('/saveslider', 'App\Http\Controllers\AddsliderContoller@saveslider')->name('saveslider');
Route::get('/editslider/{id}',  [AddsliderContoller::class, 'editslider']);
Route::get('/deleteslider/{id}',  [AddsliderContoller::class, 'deleteslider']);
Route::post('/updateslider', 'App\Http\Controllers\AddsliderContoller@updateslider')->name('updateslider');

Route::get('/',  [ClientController::class, 'home']);
Route::get('/shop',  [ClientController::class, 'shop']);
Route::get('/addtocart/{id}',  [ClientController::class, 'addtocart']);
Route::get('/cart',  [ClientController::class, 'cart']);
Route::get('/removeItem/{product_id}',  [ClientController::class, 'removeItem']);
Route::get('/update_qty/{id}',  [ClientController::class, 'update_qty']);
Route::get('/checkout',  [ClientController::class, 'checkout']);
Route::get('/signin',  [ClientController::class, 'signin']);
Route::get('/signup',  [ClientController::class, 'signup']);
Route::get('/create_account',  [ClientController::class, 'create_account']);
Route::post('/access_account',  'App\Http\Controllers\ClientController@access_account')->name('access_account');
Route::get('/orders',  [ClientController::class, 'order']);
Route::get('/logout',  [ClientController::class, 'logout']);
Route::get('/paiement_success',  [ClientController::class, 'paiement_success']);
Route::post('/postcheckout',  'App\Http\Controllers\ClientController@postcheckout')->name('postcheckout');

Route::get('/viewpdffolder/{id}',  [PdfController::class, 'view_pdf']);