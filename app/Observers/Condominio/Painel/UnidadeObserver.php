<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Unidade;
use Illuminate\Support\Str;

class UnidadeObserver
{
    /**
     * Handle the Unidade "creating" event.
     */
    public function creating(Unidade $unidade): void
    {
        $unidade->url = Str::kebab($unidade->nome);
    }

    /**
     * Handle the Unidade "updating" event.
     */
    public function updating(Unidade $unidade): void
    {
        $unidade->url = Str::kebab($unidade->nome);
    }
}
