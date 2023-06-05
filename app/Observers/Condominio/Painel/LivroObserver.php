<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Livro;
use Illuminate\Support\Str;

class LivroObserver
{
    /**
     * Handle the Livro "creating" event.
     */
    public function creating(Livro $livro): void
    {
        $livro->url = Str::kebab($livro->titulo);
    }

    /**
     * Handle the Livro "updating" event.
     */
    public function updating(Livro $livro): void
    {
        $livro->url = Str::kebab($livro->titulo);
    }
}
