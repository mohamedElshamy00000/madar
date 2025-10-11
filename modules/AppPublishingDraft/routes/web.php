<?php

use Illuminate\Support\Facades\Route;
use Modules\AppPublishingDraft\Http\Controllers\AppPublishingDraftController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(["prefix" => "app/publishing/draft"], function () {
    
    // THIS IS THE CORRECTED CODE BLOCK
    // هذا هو الكود الصحيح
    
    // This one line creates all standard routes: index, create, store, edit, update, destroy
    // هذا السطر الواحد ينشئ كل الـ routes القياسية
    Route::resource('/', AppPublishingDraftController::class)->names('app.publishing.draft');

    // These are custom routes, so we keep them.
    // هذه routes مخصصة، لذلك نحتفظ بها
    Route::post('list', [AppPublishingDraftController::class, 'list'])->name('app.publishing.draft.list');
    Route::post('save', [AppPublishingDraftController::class, 'save'])->name('app.publishing.draft.save');
    Route::post('status/{any}', [AppPublishingDraftController::class, 'status'])->name('app.publishing.draft.status');
});
