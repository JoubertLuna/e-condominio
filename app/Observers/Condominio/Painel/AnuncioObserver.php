<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Anuncio;
use Illuminate\Support\Str;

class AnuncioObserver
{
    /**
     * Handle the Anuncio "creating" event.
     */
    public function creating(Anuncio $anuncio): void
    {
        $anuncio->url = Str::kebab($anuncio->titulo);
    }

    /**
     * Handle the Anuncio "updating" event.
     */
    public function updating(Anuncio $anuncio): void
    {
        $anuncio->url = Str::kebab($anuncio->titulo);
    }
}
