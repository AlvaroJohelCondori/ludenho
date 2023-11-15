<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('home', [HomeController::class, 'index'])->name('admin.home');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('materials', MaterialController::class)->names('admin.materials');
