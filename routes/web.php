<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Models\Room;
use App\Models\Booking;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalRooms' => Room::count(),
        'availableRooms' => Room::where('status', 'Available')->count(),
        'totalBookings' => Booking::count(),
        'pendingBookings' => Booking::where('status', 'Pending')->count(),
    ]);
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);

    Route::get('/bookings-export-pdf', [BookingController::class, 'exportPdf'])
    ->name('bookings.exportPdf');

    Route::resource('bookings', BookingController::class);
    

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
