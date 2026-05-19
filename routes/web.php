<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\front\HomepageController;
use App\Http\Controllers\MedicalDocumentController;
use App\Http\Controllers\PanelController;


Route::resource('appointments', AppointmentController::class);
Route::get('/', [HomepageController::class, 'index'])->name('homepage');


Route::middleware('auth')->group(function (){
    Route::resource('medical-documents', MedicalDocumentController::class);
});

Route::middleware(['auth'])->group(function (){
Route::get('/panel', [PanelController::class, 'index'])->name('panel');
});



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
