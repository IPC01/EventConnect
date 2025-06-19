<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventHallController;
use App\Http\Controllers\Admin\DecorationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\PackageController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop');
Route::get('/galery', [ShopController::class, 'galery'])->name('shop.galery');
Route::get('/package', [ShopController::class, 'package'])->name('shop.package');
Route::get('/package/details', [ShopController::class, 'packagedetails'])->name('shop.package.details');



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard do Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users/index', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('/users/store', [AdminController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/update', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}/destroy', [AdminController::class, 'destroy'])->name('users.destroy');
    
    //Event Hall
    Route::resource('hall', EventHallController::class);

    //Decorations
    Route::resource('decorations', DecorationController::class);

    //items de menu
    Route::resource('items', ItemController::class);

    //items de menu
    Route::resource('menus', MenuController::class);

    //configuracoes
    Route::resource('settings', SettingController::class);

    //pacotes
    Route::resource('packages', PackageController::class);

    
  
});


require __DIR__.'/auth.php';
