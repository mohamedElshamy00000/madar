<?php

use Illuminate\Support\Facades\Route;
use Modules\AppFiles\Http\Controllers\AppFilesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "app/files"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        // This one line creates all standard routes: index, create, store, edit, update, destroy
        // هذا السطر الواحد ينشئ كل الـ routes القياسية
        Route::resource('/', AppFilesController::class)->names('app.files');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::post('popup_files', [AppFilesController::class, 'popup_files'])->name('app.files.popup_files');
        Route::post('list', [AppFilesController::class, 'list'])->name('app.files.list');
        Route::post('mini_list', [AppFilesController::class, 'list'])->name('app.files.mini_list');
        Route::post('popup_list', [AppFilesController::class, 'list'])->name('app.files.popup_list');
        Route::post('upload_files', [AppFilesController::class, 'upload_files'])->name('app.files.upload_files');
        Route::post('upload_from_url', [AppFilesController::class, 'upload_from_url'])->name('app.files.upload_from_url');
        Route::post('save_file', [AppFilesController::class, 'save_file'])->name('app.files.save_file');
        Route::post('save_files', [AppFilesController::class, 'save_files'])->name('app.files.save_files');
        Route::post('save_file_from_cloud', [AppFilesController::class, 'save_file_from_cloud'])->name('app.files.save_file_from_cloud');
        Route::post('update_folder', [AppFilesController::class, 'update_folder'])->name('app.files.update_folder');
        Route::post('save_folder', [AppFilesController::class, 'save_folder'])->name('app.files.save_folder');
        Route::post('popup_search_media', [AppFilesController::class, 'popup_search_media'])->name('app.files.popup_search_media');
    });

    Route::group(["prefix" => "admin/settings"], function () {
        Route::get('files', [AppFilesController::class, 'settings'])->name('app.files.files');
    });
});
