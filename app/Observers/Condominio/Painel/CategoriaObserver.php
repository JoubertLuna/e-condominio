<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Categoria;
use Illuminate\Support\Str;

class CategoriaObserver
{
    /**
     * Handle the Categoria "creating" event.
     */
    public function creating(Categoria $categoria): void
    {
        $categoria->url = Str::kebab($categoria->nome);
    }

    /**
     * Handle the Categoria "updating" event.
     */
    public function updating(Categoria $categoria): void
    {
        $categoria->url = Str::kebab($categoria->nome);
    }
}
