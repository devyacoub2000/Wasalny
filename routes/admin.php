<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomFieldController;


Route::prefix(LaravelLocalization::setLocale())->middleware('auth', 'is_admin')->group(function() {

  Route::prefix('admin')->name('admin.')->group(function() {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('profile',   [AdminController::class, 'profile'])->name('profile');
    Route::put('profile',   [AdminController::class, 'profile_data'])->name('profile_data');
    Route::post('check-password', [AdminController::class, 'check_password'])
    ->name('check_password');

    Route::resource('category', CategoryController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('custome_fields', CustomFieldController::class);

       

});

});


