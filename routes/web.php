<?php

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
});
Route::controller(HouseController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('houses/{house}', 'show')->name('houses.show');
});

Auth::routes();
