<?php

use Illuminate\Support\Facades\Route;
use Modules\AppChannels\Http\Controllers\AppChannelsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "app/channels"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        // This one line creates all standard routes: index, create, store, edit, update, destroy
        // هذا السطر الواحد ينشئ كل الـ routes القياسية
        Route::resource('/', AppChannelsController::class)->names('app.channels');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::get('add', [AppChannelsController::class, 'add'])->name('app.channels.add');
        Route::post('save', [AppChannelsController::class, 'save'])->name('app.channels.save');
        Route::post('list', [AppChannelsController::class, 'list'])->name('app.channels.list');
        Route::post('status/{any}', [AppChannelsController::class, 'status'])->name('app.channels.status');
    });
});
