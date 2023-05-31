<?php

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Condominio\Painel\{
    BlocoController,
    CondominioController,
    HomeController,
    UnidadeController,
    UserController
};

use Illuminate\Support\Facades\Route;

#Route Login
Route::get('/', [LoginController::class, 'showLoginForm']);
#Route Login

Route::middleware('auth', 'verified')->group(function () {

    #Route Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    #Route Home

    #Route Condominio
    Route::resource('condominio', CondominioController::class);
    #Route Condominio

    #Route Bloco
    Route::resource('bloco', BlocoController::class);
    #Route Bloco

    #Route Unidade
    Route::resource('unidade', UnidadeController::class);
    #Route Unidade

    #Route User
    Route::resource('user', UserController::class);
    #Route User

    // #Route Pet
    // Route::resource('pet', PetController::class);
    // #Route Pet

    // #Route Veiculo
    // Route::resource('veiculo', VeiculoController::class);
    // #Route Veiculo

    // #Route Area
    // Route::resource('area', AreaController::class);
    // #Route Area

    // #Route Assembleia
    // Route::resource('assembleia', AssembleiaController::class);
    // #Route Assembleia

    // #Route Banco
    // Route::resource('banco', BancoController::class);
    // #Route Banco

    // #Route Categoria
    // Route::resource('categoria', CategoriaController::class);
    // #Route Categoria

    // #Route Livro
    // Route::resource('livro', LivroController::class);
    // #Route Livro

    // #Route Anuncio
    // Route::resource('anuncio', AnuncioController::class);
    // #Route Anuncio

    // #Route Reserva
    // Route::resource('reserva', ReservaController::class);
    // #Route Reserva

    // #Route Fornecedor
    // Route::resource('fornecedor', FornecedorController::class);
    // #Route Fornecedor

    // #Route Bancaria
    // Route::resource('bancaria', BancariaController::class);
    // #Route Bancaria

    // #Route Patrimonio
    // Route::resource('patrimonio', PatrimonioController::class);
    // #Route Patrimonio

    // #Route Estado
    // Route::resource('estado', EstadoController::class);
    // #Route Estado

    // #Route Pagar
    // Route::resource('conta_pagar', ContaPagarController::class);
    // #Route Pagar

    // #Route Visitante
    // Route::resource('visitante', VisitanteController::class);
    // #Route Visitante

});

Auth::routes(['register' => false, 'verify' => true]);