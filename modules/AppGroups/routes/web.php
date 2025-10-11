<?php

use Illuminate\Support\Facades\Route;
use Modules\AppGroups\Http\Controllers\AppGroupsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(["prefix" => "app/groups"], function () {
    
    // THIS IS THE CORRECTED CODE BLOCK
    // هذا هو الكود الصحيح
    
    // This one line creates all standard routes: index, create, store, edit, update, destroy
    // هذا السطر الواحد ينشئ كل الـ routes القياسية
    Route::resource('/', AppGroupsController::class)->names('app.groups');

    // These are custom routes, so we keep them.
    // هذه routes مخصصة، لذلك نحتفظ بها
    Route::post('save', [AppGroupsController::class, 'save'])->name('app.groups.save');
    Route::post('list', [AppGroupsController::class, 'list'])->name('app.groups.list');
});
