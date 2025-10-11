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
        Route::resource('/', AdminSupportLabelsController::class)->names('admin.support.labels');
        Route::post('save', [AdminSupportLabelsController::class, 'save'])->name('admin.support.labels.save');
        Route::post('status/{any}', [AdminSupportLabelsController::class, 'status'])->name('admin.labels.status');            
        Route::post('list', [AdminSupportLabelsController::class, 'list'])->name('admin.support.labels.list');
    });
});
