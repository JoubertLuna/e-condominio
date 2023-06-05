<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Estado;
use Illuminate\Support\Str;

class EstadoObserver
{
    /**
     * Handle the Estado "creating" event.
     */
    public function creating(Estado $estado): void
    {
        $estado->url = Str::kebab($estado->nome_estado);
    }

    /**
     * Handle the Estado "updating" event.
     */
    public function updating(Estado $estado): void
    {
        $estado->url = Str::kebab($estado->nome_estado);
    }
}
