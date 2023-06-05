<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Patrimonio;
use Illuminate\Support\Str;

class PatrimonioObserver
{
    /**
     * Handle the Patrimonio "creating" event.
     */
    public function creating(Patrimonio $patrimonio): void
    {
        $patrimonio->url = Str::kebab($patrimonio->nome);
    }

    /**
     * Handle the Patrimonio "updating" event.
     */
    public function updating(Patrimonio $patrimonio): void
    {
        $patrimonio->url = Str::kebab($patrimonio->nome);
    }
}
