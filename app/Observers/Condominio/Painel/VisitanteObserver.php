<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Visitante;
use Illuminate\Support\Str;

class VisitanteObserver
{
    /**
     * Handle the Visitante "creating" event.
     */
    public function creating(Visitante $visitante): void
    {
        $visitante->url = Str::kebab($visitante->nome);
    }

    /**
     * Handle the Visitante "updating" event.
     */
    public function updating(Visitante $visitante): void
    {
        $visitante->url = Str::kebab($visitante->nome);
    }
}
