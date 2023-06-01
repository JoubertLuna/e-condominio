<?php

namespace App\Providers;

use App\Models\Condominio\Painel\{
    Bloco,
    Condominio,
    Unidade,
    User,
};


use App\Observers\Condominio\Painel\{
    BlocoObserver,
    CondominioObserver,
    UnidadeObserver,
    UserObserver
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
        Condominio::observe(CondominioObserver::class);
        Bloco::observe(BlocoObserver::class);
        Unidade::observe(UnidadeObserver::class);
        User::observe(UserObserver::class);
    }
}
