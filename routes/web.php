<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::view('products', 'product.index')->name('products.index');
    Route::get('products/create', \App\Livewire\Product\Create::class)->name('products.create');
    Route::get('products/{product:uuid}', \App\Livewire\Product\Show::class)->name('products.show');
});

require __DIR__.'/auth.php';
