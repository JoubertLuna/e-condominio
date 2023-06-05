<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Banco;
use Illuminate\Support\Str;

class BancoObserver
{
    /**
     * Handle the Banco "creating" event.
     */
    public function creating(Banco $banco): void
    {
        $banco->url = Str::kebab($banco->nome);
    }

    /**
     * Handle the Banco "updating" event.
     */
    public function updating(Banco $banco): void
    {
        $banco->url = Str::kebab($banco->nome);
    }
}
