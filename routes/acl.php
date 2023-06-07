<?php

use App\Http\Controllers\Condominio\Painel\ResourceRoleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified', 'access.control.list')->group(function () {

    #Resource x Role
    Route::get('role/{id}/resources/{idResource}/detach', [ResourceRoleController::class, 'detachResourceRole'])->name('role.resources.detach');

    Route::post('role/{id}/resources/store', [ResourceRoleController::class, 'attachResourcesRole'])->name('role.resources.attach');

    Route::get('role/{id}/resources/create', [ResourceRoleController::class, 'resourcesAvailable'])->name('role.resources.available');

    Route::get('role/{id}/resources', [ResourceRoleController::class, 'resources'])->name('role.resources');
    #Resource x Role

    #Role x Resource
    Route::get('resources/{id}/role', [ResourceRoleController::class, 'roles'])->name('resources.role');
    #Role x Resource

});
