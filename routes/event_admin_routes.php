<?php

use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\LauncherController;
use Illuminate\Support\Facades\Route;


Route::resource('launcher', LauncherController::class)->except('update');



Route::view('/panel', 'admin.home')->name('event.panel');

?>