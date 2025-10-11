<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminSupportLabels\Http\Controllers\AdminSupportLabelsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin/support/labels"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        // This one line creates all standard routes: index, create, store, edit, update, destroy
        // هذا السطر الواحد ينشئ كل الـ routes القياسية
        Route::resource('/', AdminSupportLabelsController::class)->names('admin.support.labels');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::post('save', [AdminSupportLabelsController::class, 'save'])->name('admin.support.labels.save');
        Route::post('status/{any}', [AdminSupportLabelsController::class, 'status'])->name('admin.labels.status');            
        Route::post('list', [AdminSupportLabelsController::class, 'list'])->name('admin.support.labels.list');
    });
});
