<?php

use App\Http\Controllers\Event\EventController;
use Illuminate\Support\Facades\Route;

Route::get('events', [EventController::class, 'list'])->name('api.event.list');

?>