<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DescriptionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SpotController;
use App\Http\Controllers\Admin\StartController;
use Illuminate\Support\Facades\Route;

Route::get('home', [HomeController::class, 'index'])->name('admin.home');
Route::resource('starts', StartController::class)->names('admin.starts');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('materials', MaterialController::class)->names('admin.materials');
Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('spots', SpotController::class)->names('admin.spots');
Route::resource('address', AddressController::class)->names('admin.address');
Route::resource('descriptions', DescriptionController::class)->names('admin.descriptions');
