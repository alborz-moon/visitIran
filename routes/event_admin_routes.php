<?php

use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventGalleryController;
use App\Http\Controllers\Event\EventSessionController;
use App\Http\Controllers\Event\LauncherController;
use App\Http\Controllers\Event\EventTagController;
use App\Http\Controllers\Event\FacilityController;
use Illuminate\Support\Facades\Route;


Route::resource('launcher', LauncherController::class)->except('update', 'store');

Route::prefix('launcher')->group(function() {

    Route::post('/changeStatus', [LauncherController::class, 'changeStatus'])->name('launcher.changeStatus');

    Route::prefix('/{launcher}')->group(function() {
    });

});

Route::resource('facilities', FacilityController::class)->except('update');

Route::prefix('facilities')->group(function() {

    Route::post('/{facility}', [FacilityController::class, 'update'])->name('facilities.update');
    
    Route::get('/list', [FacilityController::class, 'show'])->name('facilities.show');

});


Route::resource('eventTags', EventTagController::class)->except('update', 'show');

Route::prefix('eventTags')->group(function() {
    
    Route::post('/{eventTag}', [EventTagController::class, 'update'])->name('eventTags.update');

    Route::get('/list', [EventTagController::class, 'show'])->name('eventTags.show');

});



Route::resource('event', EventController::class)->except('update');

Route::post('event/changeStatus', [EventController::class, 'changeStatus'])->name('event.changeStatus');


Route::prefix('event/{event}')->group(function() {

    Route::get('getPhase1Info', [EventController::class, 'getPhase1Info'])->name('event.getPhase1Info');

    Route::get('getPhase2Info', [EventController::class, 'getPhase2Info'])->name('event.getPhase2Info');

    Route::post('store_phase2', [EventController::class, 'store_phase2'])->name('event.store_phase2');
    
    Route::get('get_desc', [EventController::class, 'getDesc'])->name('event.get_desc');

    Route::post('store_desc', [EventController::class, 'store_desc'])->name('event.store_desc');

    Route::post('/', [EventController::class, 'update'])->name('event.update');
    
});


Route::resource('event.sessions', EventSessionController::class)->except('create', 'edit', 'update', 'destroy')->shallow();

Route::resource('event.galleries', EventGalleryController::class)->only('index', 'store', 'destroy')->shallow();

Route::delete('eventSession/{eventSession?}', [EventSessionController::class, 'destroy'])->name('sessions.destroy');


Route::view('/panel', 'admin.home')->name('event.panel');

?>