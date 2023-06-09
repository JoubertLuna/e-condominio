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
    Estado,
    Fornecedor,
    Livro,
    Patrimonio,
    Pet,
    Reserva,
    Resource,
    Role,
    Unidade,
    User,
    Veiculo,
    Visitante,
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
    EstadoObserver,
    FornecedorObserver,
    LivroObserver,
    PatrimonioObserver,
    PetObserver,
    ReservaObserver,
    ResourceObserver,
    RoleObserver,
    UnidadeObserver,
    UserObserver,
    VeiculoObserver,
    VisitanteObserver
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

        //Configurações
        Patrimonio::observe(PatrimonioObserver::class);
        Estado::observe(EstadoObserver::class);
        Role::observe(RoleObserver::class);
        Resource::observe(ResourceObserver::class);
        //Configurações

        //Visitante
        Visitante::observe(VisitanteObserver::class);
        //Visitante
    }
}
