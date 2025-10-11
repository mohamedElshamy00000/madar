<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminProxies\Http\Controllers\AdminProxiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin/proxies"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        // This one line creates all standard routes: index, create, store, edit, update, destroy
        // هذا السطر الواحد ينشئ كل الـ routes القياسية
        Route::resource('', AdminProxiesController::class)->names('admin.proxies');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::post('list', [AdminProxiesController::class, 'list'])->name('admin.proxies.list');
        Route::post('save', [AdminProxiesController::class, 'save'])->name('admin.proxies.save');
        Route::post('status/{any}', [AdminProxiesController::class, 'status'])->name('admin.proxies.status');
    });
});
