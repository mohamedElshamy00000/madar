<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminManualPayments\Http\Controllers\AdminManualPaymentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin/manual-payments"], function () {
        Route::resource('', AdminManualPaymentsController::class)->names('admin.manualpayments');

        Route::post('list', [AdminManualPaymentsController::class, 'list'])->name('admin.manualpayments.list');
        Route::post('save', [AdminManualPaymentsController::class, 'save'])->name('admin.manualpayments.save');
        Route::post('status/{any}', [AdminManualPaymentsController::class, 'status'])->name('admin.manualpayments.status');
    });
});
