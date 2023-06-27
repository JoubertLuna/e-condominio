<?php

use App\Http\Controllers\Condominio\API\{
    BlocoApiController,
    CondominioApiController,
    UnidadeApiController,
    UserApiController
};

use Illuminate\Support\Facades\Route;

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
