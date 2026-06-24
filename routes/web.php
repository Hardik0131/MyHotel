<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

Route::get('/cloudinary-test', function () {
    return Cloudinary::upload(
        public_path('images/test.jpg')
    )->getSecurePath();
});

// Route::get('/login', function () {
//     return view('visitor/login');
// });

// Route::get('register', function () {
//     return view('visitor/register');
// });

Route::get('/', [RoomController::class, 'home'])->name('hotel.home');
Route::get('hotel/rooms', [RoomController::class, 'checkAvailibility'])->name('hotel.room');
Route::get('/hotel/{room:slug}/detail', [RoomController::class, 'detail'])->name('hotel.room.detail');
Route::get('/hotel/{room:slug}/booking', [RoomController::class, 'bookingview'])->name('hotel.room.booking');
Route::get('/hotel/booking/filter', [RoomController::class, 'checkAvailibility'])->name('hotel.room.booking.filter');
Route::post('/booking/{room:slug}/store', [RoomController::class, 'booking'])->name('booking.store');

Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms');
Route::get('admin/rooms/addrooms', [RoomController::class, 'addRooms'])->name('admin.rooms.addrooms');
Route::post('admin/room/store', [RoomController::class, 'store'])->name('admin.rooms.store');
Route::get('admin/room/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
Route::put('admin/room/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
Route::delete('admin/room/delete/{id}', [RoomController::class, 'destroy'])->name('admin.rooms.delete');

Route::get('/admin/booking', [BookingController::class, 'index'])->name('admin.booking');
Route::delete('admin/booking/delete/{id}', [BookingController::class, 'destroy'])->name('admin.booking.delete');

Route::get('contact', function () {
    return view('visitor.contact');
})->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
    Route::post('admin/authenticate', [AdminAuthController::class, 'login'])->name('admin.authenticate');
});

Route::middleware('admin.auth')->group(function () {
    Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms');
    Route::get('admin/rooms/addrooms', [RoomController::class, 'addRooms'])->name('admin.rooms.addrooms');
    Route::post('admin/room/store', [RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('admin/room/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('admin/room/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('admin/room/delete/{id}', [RoomController::class, 'destroy'])->name('admin.rooms.delete');

    Route::get('/admin/booking', [BookingController::class, 'index'])->name('admin.booking');
    Route::delete('admin/booking/delete/{id}', [BookingController::class, 'destroy'])->name('admin.booking.delete');

    Route::get('admin/rooms/search', [RoomController::class, 'search'])->name('admin.rooms.search');
    Route::get('admin/booking/search', [BookingController::class, 'search'])->name('admin.booking.search');
});
