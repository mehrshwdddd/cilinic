<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\front\HomepageController;
use App\Http\Controllers\MedicalDocumentController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\SettingController;



Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware(['auth'])->group(function (){
    //panel routes
    Route::get('/panel', [PanelController::class, 'index'])->name('panel');
    //medical documents routes
    Route::resource('medical-documents', MedicalDocumentController::class);
    //setting routes
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    //appointments routes
    Route::get('/appointments',[AppointmentController::class,'index'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/status',[AppointmentController::class,'updatestatus'],)
        ->name('appointments.status');
    Route::delete('/appointments/{appointment}',[AppointmentController::class,'destroy'])->name('appointments.destroy');
    Route::get('/appointments/store',[AppointmentController::class,'store'])->name('appointments.store');
});

Route::middleware([
    'auth',
    'role:secretary'
])->group(function () {
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/patients', function () {

        return 'Secretary Panel';

    });
    Route::get('/reports',[AppointmentController::class,'reports'])->name('reports.index');

});

