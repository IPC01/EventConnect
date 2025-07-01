<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventHallController;
use App\Http\Controllers\Admin\DecorationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ReservationsController;
use App\Http\Controllers\Admin\PackageController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop');
Route::get('/galery', [ShopController::class, 'galery'])->name('shop.galery');
Route::get('/package', [ShopController::class, 'package'])->name('shop.package');
Route::get('/package/{id}', [ShopController::class, 'packagedetails'])->name('shop.package.details');
Route::get('/search', [PackageController::class, 'search'])->name('search');


Route::middleware(['auth'])->group(function () {
    Route::resource('admin/reservations', ReservationsController::class);
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/senha', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', [ProfileController::class, 'orders'])->name('profile.orders');
});
Route::prefix('user/reservations')->name('user.reservations.')->group(function () {
    Route::get('/', [ReservationsController::class, 'userReserves'])->name('index');              // List all reservations
    Route::post('/pay', [ReservationsController::class, 'storePayment'])->name('pay');      // Store a new payment
    Route::patch('/{id}/mark-unpaid', [ReservationsController::class, 'markAsUnpaid'])->name('mark-unpaid'); // Mark reservation as unpaid
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

    //orders
    Route::patch('orders/{id}/status', [ReservationsController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('/orders/{order}', [OrderController::class, 'destroyorder'])->name('orders.destroy');

    //reserves
    Route::get('reserves', [ReservationsController::class, 'indexReserve'])->name('reserves.index');
   Route::get('reserves/{id}/edit', [ReservationsController::class, 'edit'])->name('reserves.edit');
    Route::put('reserves/{id}', [ReservationsController::class, 'update'])->name('reserves.update');
    Route::delete('reserves/{id}', [ReservationsController::class, 'destroy'])->name('reserves.destroy');
    Route::patch('reserves/{id}/toggle-status', [ReservationsController::class, 'toggleStatus'])->name('reserves.toggleStatus');


    
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
