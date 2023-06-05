<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Reserva;
use Illuminate\Support\Str;

class ReservaObserver
{
    /**
     * Handle the Reserva "creating" event.
     */
    public function creating(Reserva $reserva): void
    {
        $reserva->url = Str::kebab($reserva->titulo);
    }

    /**
     * Handle the Reserva "updating" event.
     */
    public function updating(Reserva $reserva): void
    {
        $reserva->url = Str::kebab($reserva->titulo);
    }
}
