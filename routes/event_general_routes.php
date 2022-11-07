<?php

use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\LauncherController;
use Illuminate\Support\Facades\Route;

Route::get('events', [EventController::class, 'list'])->name('api.event.list');


Route::middleware(['myAuth'])->group(function() {

    Route::resource('launcher', LauncherController::class)->except('edit', 'create');

});


?>