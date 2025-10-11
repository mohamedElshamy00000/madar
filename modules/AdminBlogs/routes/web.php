<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminBlogs\Http\Controllers\AdminBlogsController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin/blogs"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        // This one line creates all standard routes: index, create, store, edit, update, destroy
        // هذا السطر الواحد ينشئ كل الـ routes القياسية
        Route::resource('', AdminBlogsController::class)->names('admin.blogs');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::post('list', [AdminBlogsController::class, 'list'])->name('admin.blogs.list');
        Route::post('save', [AdminBlogsController::class, 'save'])->name('admin.blogs.save');
        Route::post('status/{any}', [AdminBlogsController::class, 'status'])->name('admin.blogs.status');
    });
});
