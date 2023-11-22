<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StartController;
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

Route::get('/', [StartController::class, 'index'])->name('start.index');

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('product/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('category/{category}', [ProductController::class, 'category'])->name('products.category');
Route::get('material/{material}', [ProductController::class, 'material'])->name('products.material');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
