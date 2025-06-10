<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontServiceController;

Route::prefix(LaravelLocalization::setLocale())->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('front.index');
    Route::get('categories', [HomeController::class, 'categories'])->name('front.categories');
    Route::get('services/{id}', [HomeController::class, 'category_service'])->name('front.category_service');
    Route::get('contact', [HomeController::class, 'contact_us'])->name('front.contact_us');
    Route::post('contact', [HomeController::class, 'store_msg'])->name('front.store_msg');

    Route::get('showservice/{id}', [HomeController::class, 'service_details'])->name('front.service_details');

    Route::post('store_order/{id}', [FrontServiceController::class, 'store_request'])->middleware('auth')->name('front.service.request');

    Route::get('myorders', [HomeController::class, 'myorders'])->name('front.myorders');

    Route::delete('cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('front.cancel_order');

    Route::get('all_orders', [HomeController::class, 'all_orders_provider'])->name('front.all_orders_provider');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
