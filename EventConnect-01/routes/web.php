<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventHallController;
use App\Http\Controllers\Admin\DecorationController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop');
Route::get('/index', function () {
    return view('admin.pages.index');
});


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

    
  
});


require __DIR__.'/auth.php';
