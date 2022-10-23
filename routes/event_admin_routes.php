<?php

use App\Http\Controllers\Event\LauncherController;
use App\Http\Controllers\Shop\EventTagController;
use Database\Factories\FacilityFactory;
use Illuminate\Support\Facades\Route;


Route::resource('launcher', LauncherController::class)->except('update');

Route::resource('facilities', FacilityFactory::class)->except('update', 'show', 'edit', 'create');

Route::resource('tags', EventTagController::class)->except('update', 'show', 'edit', 'create');


Route::view('/panel', 'admin.home')->name('event.panel');

?>