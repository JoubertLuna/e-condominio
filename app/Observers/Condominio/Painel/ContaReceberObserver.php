<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\ContaReceber;
use Illuminate\Support\Str;

class ContaReceberObserver
{
    /**
     * Handle the ContaReceber "creating" event.
     */
    public function creating(ContaReceber $contaReceber): void
    {
        $contaReceber->url = Str::kebab($contaReceber->nome);
    }

    /**
     * Handle the ContaReceber "updating" event.
     */
    public function updating(ContaReceber $contaReceber): void
    {
        $contaReceber->url = Str::kebab($contaReceber->nome);
    }
}
