<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Condominio;
use Illuminate\Support\Str;

class CondominioObserver
{
    /**
     * Handle the Condominio "creating" event.
     */
    public function creating(Condominio $condominio): void
    {
        $condominio->url = Str::kebab($condominio->nome);
    }

    /**
     * Handle the Condominio "updating" event.
     */
    public function updating(Condominio $condominio): void
    {
        $condominio->url = Str::kebab($condominio->nome);
    }
}
