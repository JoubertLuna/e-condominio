<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\ContaPagar;
use Illuminate\Support\Str;

class ContaPagarObserver
{
    /**
     * Handle the ContaPagar "creating" event.
     */
    public function creating(ContaPagar $contaPagar): void
    {
        $contaPagar->url = Str::kebab($contaPagar->nome);
    }

    /**
     * Handle the ContaPagar "updating" event.
     */
    public function updating(ContaPagar $contaPagar): void
    {
        $contaPagar->url = Str::kebab($contaPagar->nome);
    }
}
