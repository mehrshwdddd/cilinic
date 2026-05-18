<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;



Route::resource('appointments', AppointmentController::class);



Route::middleware([
    'auth',
    'role:secretary'
])->group(function () {

    Route::get('/patients', function () {

        return 'Secretary Panel';

    });

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
