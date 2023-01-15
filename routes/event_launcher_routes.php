<?php

use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventGalleryController;
use App\Http\Controllers\Event\EventSessionController;
use App\Http\Controllers\Event\LauncherController;
use Illuminate\Support\Facades\Route;

Route::get('getPlaceInfo/{launcher?}', [LauncherController::class, 'getPlaceInfo'])->name('getPlaceInfo');

Route::get('/create-event', [EventController::class, 'create'])->name('create-event');
        
Route::get('/update-event/{event}', [EventController::class, 'edit'])->name('update-event');

Route::get('/addSessionsInfo/{event?}', [EventController::class, 'addSessionsInfo'])->name('addSessionsInfo');

Route::get('/addPhase2Info/{event?}', [EventController::class, 'addPhase2Info'])->name('addPhase2Info');

Route::get('/addGalleryToEvent/{event?}', [EventController::class, 'addGalleryToEvent'])->name('addGalleryToEvent');

Route::resource('event', EventController::class)->except('update', 'destroy');


Route::resource('launcher.follow', LauncherFollowersController::class)->only('index')->shallow();


Route::prefix('event/{event}')->group(function() {

    Route::post('send_for_review', [EventController::class, 'sendForReview'])->name('event.sendForReview');

    Route::get('getPhase1Info', [EventController::class, 'getPhase1Info'])->name('event.getPhase1Info');

    Route::get('getPhase2Info', [EventController::class, 'getPhase2Info'])->name('event.getPhase2Info');

    Route::post('store_phase2', [EventController::class, 'store_phase2'])->name('event.store_phase2');
    
    Route::get('get_desc', [EventController::class, 'getDesc'])->name('event.get_desc');

    Route::post('store_desc', [EventController::class, 'store_desc'])->name('event.store_desc');

    Route::post('set_main_img', [EventController::class, 'set_main_img'])->name('event.set_main_img');
    
    Route::get('get_main_img', [EventController::class, 'get_main_img'])->name('event.get_main_img');

    Route::post('/', [EventController::class, 'update'])->name('event.update');
    
});

Route::resource('event.sessions', EventSessionController::class)->except('create', 'edit', 'update', 'destroy')->shallow();

Route::resource('event.galleries', EventGalleryController::class)->only('index', 'store')->shallow();

Route::delete('event/galleries/{gallery?}', [EventGalleryController::class, 'destroy'])->name('event.galleries.destroy');

Route::delete('eventSession/{eventSession?}', [EventSessionController::class, 'destroy'])->name('sessions.destroy');


?>