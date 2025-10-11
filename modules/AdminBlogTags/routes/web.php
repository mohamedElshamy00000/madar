<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminBlogTags\Http\Controllers\AdminBlogTagsController;


Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        Route::group(["prefix" => "blogs/tags"], function () {
            
            // This one line creates the standard routes like update, destroy, store, etc.
            // هذا السطر يقوم بإنشاء الـ routes القياسية
            Route::resource('/', AdminBlogTagsController::class)->names('admin.blogs.tags');

            // These are custom routes, so we keep them.
            // هذه routes مخصصة، لذلك نحتفظ بها
            Route::post('save', [AdminBlogTagsController::class, 'save'])->name('admin.blogs.tags.save');
            Route::post('list', [AdminBlogTagsController::class, 'list'])->name('admin.blogs.tags.list');
            Route::post('status/{any}', [AdminBlogTagsController::class, 'status'])->name('app.blogs.tags.status');
        });

    });
});
