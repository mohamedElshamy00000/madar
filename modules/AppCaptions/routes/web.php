<?php

use Illuminate\Support\Facades\Route;
use Modules\AppCaptions\Http\Controllers\AppCaptionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(["prefix" => "app/captions"], function () {
    
    // THIS IS THE CORRECTED CODE BLOCK
    // هذا هو الكود الصحيح
    
    // This one line creates all standard routes: index, create, store, edit, update, destroy
    // هذا السطر الواحد ينشئ كل الـ routes القياسية
    Route::resource('/', AppCaptionsController::class)->names('app.captions');

    // These are custom routes, so we keep them.
    // هذه routes مخصصة، لذلك نحتفظ بها
    Route::post('save', [AppCaptionsController::class, 'save'])->name('app.captions.save');
    Route::post('list', [AppCaptionsController::class, 'list'])->name('app.captions.list');
    Route::post('list/popup', [AppCaptionsController::class, 'list'])->name('app.captions.popup_list');
    Route::post('save_cation', [AppCaptionsController::class, 'saveCation'])->name('app.captions.save_cation');
    Route::post('get_cation', [AppCaptionsController::class, 'getCation'])->name('app.captions.get_cation');
});
