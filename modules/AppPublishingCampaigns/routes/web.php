<?php

use Illuminate\Support\Facades\Route;
use Modules\AppPublishingCampaigns\Http\Controllers\AppPublishingCampaignsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(["prefix" => "app/publishing/campaigns"], function () {
    
    // THIS IS THE CORRECTED CODE BLOCK
    // هذا هو الكود الصحيح
    
    // This one line creates all standard routes: index, create, store, edit, update, destroy
    // هذا السطر الواحد ينشئ كل الـ routes القياسية
    Route::resource('/', AppPublishingCampaignsController::class)->names('app.publishingcampaigns');

    // These are custom routes, so we keep them.
    // هذه routes مخصصة، لذلك نحتفظ بها
    Route::post('list', [AppPublishingCampaignsController::class, 'list'])->name('app.publishingcampaigns.list');
    Route::post('save', [AppPublishingCampaignsController::class, 'save'])->name('app.publishingcampaigns.save');
    Route::post('status/{any}', [AppPublishingCampaignsController::class, 'status'])->name('app.publishingcampaigns.status');
});
