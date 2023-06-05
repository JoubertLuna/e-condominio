<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Bancaria;
use Illuminate\Support\Str;

class BancariaObserver
{
    /**
     * Handle the Bancaria "creating" event.
     */
    public function creating(Bancaria $bancaria): void
    {
        $bancaria->url = Str::kebab($bancaria->nome);
    }

    /**
     * Handle the Bancaria "updating" event.
     */
    public function updating(Bancaria $bancaria): void
    {
        $bancaria->url = Str::kebab($bancaria->nome);
    }
}
