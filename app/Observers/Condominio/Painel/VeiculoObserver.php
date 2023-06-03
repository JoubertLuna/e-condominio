<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Veiculo;
use Illuminate\Support\Str;

class VeiculoObserver
{
    /**
     * Handle the Veiculo "creating" event.
     */
    public function creating(Veiculo $veiculo): void
    {
        $veiculo->url = Str::kebab($veiculo->placa);
    }

    /**
     * Handle the Veiculo "updating" event.
     */
    public function updating(Veiculo $veiculo): void
    {
        $veiculo->url = Str::kebab($veiculo->placa);
    }
}
