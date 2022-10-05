<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HouseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::controller(HouseController::class)->group(function () {
        Route::get('houses/create', 'create')->name('houses.create');
        Route::get('houses/{house}/edit', 'edit')->name('houses.edit');
        Route::post('houses', 'store')->name('houses.store');
        Route::post('houses/{house}', 'update')->name('houses.update');
        Route::delete('houses/{house}', 'destroy')->name('houses.delete');
    });
    Route::controller(BookingController::class)->group(function () {
        Route::get('bookings', 'index')->name('bookings.index');
        Route::get('houses/{house}/bookings/create', 'create')->name('bookings.create');
        Route::get('bookings/{booking}', 'show')->name('bookings.show');
        Route::get('bookings/{booking}/edit', 'edit')->name('bookings.edit');
        Route::post('bookings', 'store')->name('bookings.store');
        Route::post('bookings/{booking}', 'update')->name('bookings.update');
        Route::delete('bookings/{booking}', 'destroy')->name('bookings.delete');
    });
});

Route::controller(HouseController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('houses/{house}', 'show')->name('houses.show');
});

Auth::routes();
