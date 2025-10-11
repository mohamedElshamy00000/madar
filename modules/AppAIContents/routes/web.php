<?php

use Illuminate\Support\Facades\Route;
use Modules\AppAIContents\Http\Controllers\AppAIContentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "app/ai-contents"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        Route::resource('/', AppAIContentsController::class)->names('app.ai-contents');
        Route::post('categories', [AppAIContentsController::class, 'categories'])->name('app.ai-contents.categories');
        Route::post('templates', [AppAIContentsController::class, 'templates'])->name('app.ai-contents.templates');
        
        // We keep only the more general route with the parameter
        // نحتفظ فقط بالـ route الأكثر عمومية الذي يحتوي على الباراميتر
        Route::post('process/{any?}', [AppAIContentsController::class, 'process'])->name('app.ai-contents.process');
        
        Route::post('create-content', [AppAIContentsController::class, 'createContent'])->name('app.ai-contents.create_content');
        Route::post('popup-ai-content', [AppAIContentsController::class, 'popupAIContent'])->name('app.ai-contents.popupAIContent');
    });
});
