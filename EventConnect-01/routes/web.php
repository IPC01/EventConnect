<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop');
Route::get('/index', function () {
    return view('admin.pages.index');
});

Route::middleware('auth')->group(function () {
   
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
