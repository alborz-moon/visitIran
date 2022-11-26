<?php

use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventSessionController;
use App\Http\Controllers\Event\LauncherController;
use App\Http\Controllers\Event\EventTagController;
use App\Http\Controllers\Event\FacilityController;
use Illuminate\Support\Facades\Route;


Route::resource('launcher', LauncherController::class)->except('update');


Route::resource('facilities', FacilityController::class)->except('update');

Route::post('facilities/{facility}', [FacilityController::class, 'update'])->name('facilities.update');


Route::resource('eventTags', EventTagController::class)->except('update');

Route::post('eventTags/{eventTag}', [EventTagController::class, 'update'])->name('eventTags.update');


Route::resource('event', EventController::class)->except('update');


Route::resource('event.sessions', EventSessionController::class)->except('create', 'edit', 'update')->shallow();


Route::view('/panel', 'admin.home')->name('event.panel');

?>