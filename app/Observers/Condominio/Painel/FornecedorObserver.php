<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Fornecedor;
use Illuminate\Support\Str;

class FornecedorObserver
{
    /**
     * Handle the Fornecedor "creating" event.
     */
    public function creating(Fornecedor $fornecedor): void
    {
        $fornecedor->url = Str::kebab($fornecedor->razao_social);
    }

    /**
     * Handle the Fornecedor "updating" event.
     */
    public function updating(Fornecedor $fornecedor): void
    {
        $fornecedor->url = Str::kebab($fornecedor->razao_social);
    }
}
