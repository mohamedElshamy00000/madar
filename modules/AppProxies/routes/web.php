<?php

use Illuminate\Support\Facades\Route;
use Modules\AppProxies\Http\Controllers\AppProxiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "app/proxies"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        // This one line creates all standard routes: index, create, store, edit, update, destroy
        // هذا السطر الواحد ينشئ كل الـ routes القياسية
        Route::resource('', AppProxiesController::class)->names('app.proxies');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::post('list', [AppProxiesController::class, 'list'])->name('app.proxies.list');
        Route::post('save', [AppProxiesController::class, 'save'])->name('app.proxies.save');
        Route::post('status/{any}', [AppProxiesController::class, 'status'])->name('app.proxies.status');
    });
});
