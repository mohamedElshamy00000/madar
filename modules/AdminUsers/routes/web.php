<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminUsers\Http\Controllers\AdminUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(["prefix" => "admin/users"], function () {
        
        // THIS IS THE CORRECTED CODE BLOCK
        // هذا هو الكود الصحيح
        
        // This one line creates all standard routes: index, create, store, edit, update, destroy
        // هذا السطر الواحد ينشئ كل الـ routes القياسية
        Route::resource('/', AdminUsersController::class)->names('admin.users');

        // These are custom routes, so we keep them.
        // هذه routes مخصصة، لذلك نحتفظ بها
        Route::post('list', [AdminUsersController::class, 'list'])->name('admin.users.list');
        Route::get('export', [AdminUsersController::class, 'export'])->name('admin.users.export');
        Route::post('save', [AdminUsersController::class, 'save'])->name('admin.users.save');
        Route::post('change_password', [AdminUsersController::class, 'change_password'])->name('admin.users.change_password');
        Route::post('update_plan', [AdminUsersController::class, 'update_plan'])->name('admin.users.update_plan');
        Route::post('update_info', [AdminUsersController::class, 'update_info'])->name('admin.users.update_info');
        Route::post('status/{any}', [AdminUsersController::class, 'status'])->name('admin.users.status');
        Route::get('search', [AdminUsersController::class, 'get_search_users'])->name('admin.users.search');
    });
});
