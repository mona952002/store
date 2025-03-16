<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use Illuminate\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

//Dashboard Routes
// products
Route::resource('products', ProductsController::class);
Route::get('products', [ProductsController::class, 'index']);
Route::get('products/create', [ProductsController::class, 'create']);
Route::post('products/store', [ProductsController::class, 'store']);
Route::get('products/edit/{id}', [ProductsController::class, 'edit']);
Route::get('products/delete/{id}', [ProductsController::class, 'destroy']);
Route::patch('products/update/{id}', [ProductsController::class, 'update']);

// Ctegories

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories/store', [CategoryController::class, 'store']);
Route::get('categories/edit/{id}', [CategoryController::class, 'edit']);
Route::get('categories/update/{id}', [CategoryController::class, 'update']);
Route::patch('categories/delete/{id}', [CategoryController::class, 'destroy']);

// Front Page Routes

Route::get('/', [FrontController::class, 'index']);
