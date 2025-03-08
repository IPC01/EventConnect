<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventHallController;
use App\Http\Controllers\DecorationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;

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
// Route::middleware(['auth', 'acess'])->group(function () {

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //tipos de evento
    Route::post('registerType', [EventController::class, 'storeType']);

    //acesso
    Route::post('/registerRole', [AuthController::class, 'roleStore']);

    //tipos de evento
    Route::get('event/list', [EventController::class, 'showEventType'])->name('event.list');
    Route::post('registerTypes', [EventController::class, 'storeType'])->name('event.add');
    Route::put('editType/{id}', [EventController::class, 'updateType'])->name('event.update');
    Route::get('eventType/{id}', [EventController::class, 'getType'])->name('event.type');
    Route::get('/eventTypes', [EventController::class, 'getTypes'])->name('event.types');

    //users
    Route::get('users/list', [AuthController::class, 'showUserList'])->name('users.list');

    //saloes de evento
    Route::get('/event-halls', [EventHallController::class, 'index'])->name('eventHall.list');
    Route::get('/event-halls/create', [EventHallController::class, 'create'])->name('eventHall.create');
    Route::post('/event-halls', [EventHallController::class, 'store'])->name('eventHall.store');
    Route::get('/event-halls/{id}/edit', [EventHallController::class, 'edit'])->name('eventHall.edit');
    Route::put('/event-halls/{id}', [EventHallController::class, 'update'])->name('eventHall.update');
    Route::delete('/event-halls/{id}', [EventHallController::class, 'destroy'])->name('eventHall.destroy');

    //decoracoes
    Route::resource('decoration', DecorationController::class);

    //menu
    Route::resource('item', ItemController::class);
    Route::resource('menu', MenuController::class);

    //pacotes
    Route::get('/event-halls/details/{id}', [EventHallController::class, 'eventHallDetails'])->name('event-halls.details');
    Route::post('/packages', [EventHallController::class, 'storePackage'])->name('package.store');

});

require __DIR__ . '/auth.php';
// });
