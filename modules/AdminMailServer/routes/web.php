<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminMailServer\Http\Controllers\AdminMailServerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin/settings"], function () {
        
        Route::resource('mail-server', AdminMailServerController::class)
            ->only(['index'])
            ->names('admin.settings.mail-server'); // CHANGED from 'admin.settings'
    });

    Route::post('admin/mail-server/test', [AdminMailServerController::class, 'testSendEmail'])->name('admin.mail-server.test');
});
