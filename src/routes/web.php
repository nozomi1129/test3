<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/search', [ProductController::class, 'search']);


Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::patch('/products/{id}/update', [ProductController::class, 'update'])->name('product.update');

Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/register', [ProductController::class, 'register']);

Route::post('/products/register', [ProductController::class, 'store']);