<?php

use App\Http\Controllers\Condominio\API\{
    AuthApiController,
    BlocoApiController,
    CondominioApiController,
    UnidadeApiController,
    UserApiController
};

use Illuminate\Support\Facades\Route;

Route::controller(AuthApiController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('auth:api', 'verified')->group(function () {
    // Condominio
    #Route Condominio
    Route::resource('condominio', CondominioApiController::class);
    #Route Condominio

    #Route Bloco
    Route::resource('bloco', BlocoApiController::class);
    #Route Bloco

    #Route Unidade
    Route::resource('unidade', UnidadeApiController::class);
    #Route Unidade

    #Route User
    Route::resource('user', UserApiController::class);
    #Route User
    //Condominio
});
