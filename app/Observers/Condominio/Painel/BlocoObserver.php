<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Bloco;
use Illuminate\Support\Str;

class BlocoObserver
{
    /**
     * Handle the Bloco "creating" event.
     */
    public function creating(Bloco $bloco): void
    {
        $bloco->url = Str::kebab($bloco->nome);
    }

    /**
     * Handle the Bloco "updating" event.
     */
    public function updating(Bloco $bloco): void
    {
        $bloco->url = Str::kebab($bloco->nome);
    }
}
