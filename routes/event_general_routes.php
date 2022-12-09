<?php

use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\LauncherBankAccountsController;
use App\Http\Controllers\Event\LauncherCertificationsController;
use App\Http\Controllers\Event\LauncherController;
use Illuminate\Support\Facades\Route;

Route::get('events', [EventController::class, 'list'])->name('api.event.list');

Route::get('show-launcher/{launcher}', [LauncherController::class, 'show_user'])->name('api.launcher.show-user');


Route::middleware(['myAuth'])->group(function() {

    Route::resource('launcher', LauncherController::class)->except('edit', 'create', 'update');

    Route::prefix('launcher')->group(function() {

        Route::post('/{launcher}', [LauncherController::class, 'update'])->name('launcher.update');

        Route::get('/{launcher}/files', [LauncherController::class, 'showFiles'])->name('launcher.files');

        Route::post('/launcher_bank_accounts/{launcher_bank?}', [LauncherBankAccountsController::class, 'update'])->name('launcher_bank_accounts.update');
    
        Route::delete('/launcher_bank_accounts/{launcher_bank?}', [LauncherBankAccountsController::class, 'destroy'])->name('launcher_bank_accounts.destroy');

    });


    Route::resource('launcher.launcher_certifications', LauncherCertificationsController::class)->only('store', 'destroy')->shallow();

    Route::resource('launcher.launcher_bank_accounts', LauncherBankAccountsController::class)->only('store', 'index')->shallow();

});


?>