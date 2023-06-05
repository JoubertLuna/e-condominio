<?php

namespace App\Providers;

use App\Models\Condominio\Painel\{
    Anuncio,
    Area,
    Assembleia,
    Bancaria,
    Banco,
    Bloco,
    Categoria,
    Condominio,
    ContaPagar,
    ContaReceber,
    Fornecedor,
    Livro,
    Pet,
    Reserva,
    Unidade,
    User,
    Veiculo,
};

use App\Observers\Condominio\Painel\{
    AnuncioObserver,
    AreaObserver,
    AssembleiaObserver,
    BancariaObserver,
    BancoObserver,
    BlocoObserver,
    CategoriaObserver,
    CondominioObserver,
    ContaPagarObserver,
    ContaReceberObserver,
    FornecedorObserver,
    LivroObserver,
    PetObserver,
    ReservaObserver,
    UnidadeObserver,
    UserObserver,
    VeiculoObserver
};

use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Condominio
        Condominio::observe(CondominioObserver::class);
        Bloco::observe(BlocoObserver::class);
        Unidade::observe(UnidadeObserver::class);
        User::observe(UserObserver::class);
        Pet::observe(PetObserver::class);
        Veiculo::observe(VeiculoObserver::class);
        Area::observe(AreaObserver::class);
        Assembleia::observe(AssembleiaObserver::class);
        Livro::observe(LivroObserver::class);
        Anuncio::observe(AnuncioObserver::class);
        Reserva::observe(ReservaObserver::class);
        //Condominio

        //Financeiro
        Banco::observe(BancoObserver::class);
        Categoria::observe(CategoriaObserver::class);
        Bancaria::observe(BancariaObserver::class);
        Fornecedor::observe(FornecedorObserver::class);
        ContaPagar::observe(ContaPagarObserver::class);
        ContaReceber::observe(ContaReceberObserver::class);
        //Financeiro
    }
}
