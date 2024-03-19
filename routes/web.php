<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserBookingsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Réservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservation/{id}', [ReservationController::class, 'view'])->name('reservations.view');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');


    // Réservations de l'utilisateur
    Route::get('/bookings', [UserBookingsController::class, 'index'])->name('bookings.index');

});


Route::middleware(['auth', 'admin'])->group(function() {
    
    // Hôtels
    Route::get('/hotels', [HotelController::class, 'index'])->name('hotel.index');
    Route::get('/hotel', [HotelController::class, 'create'])->name('hotel.create');
    Route::post('/hotel', [HotelController::class, 'store'])->name('hotel.store');
    Route::get('/hotel/{id}/edit', [HotelController::class, 'edit'])->name('hotel.edit');
    Route::put('/hotel/{id}/update', [HotelController::class, 'update'])->name('hotel.update');
    Route::delete('/hotel', [HotelController::class, 'destroy'])->name('hotel.destroy');
    Route::get('/hotel/{id}', [HotelController::class, 'view'])->name('hotel.view');
    Route::get('/hotel/{id}/room/create', [RoomController::class, 'create'])->name('hotel-room.create');

    // Chambres
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/room/create/{hotel_id?}', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/room', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/room/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/room/{id}/update', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/room', [RoomController::class, 'destroy'])->name('rooms.destroy');
    Route::post('/room/release/{roomId}', [RoomController::class, 'releaseRoom'])->name('rooms.release');
    
    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user', [UserController::class, 'destroy'])->name('users.destroy');

});

require __DIR__.'/auth.php';
