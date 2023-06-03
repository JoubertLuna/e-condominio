<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Pet;
use Illuminate\Support\Str;

class PetObserver
{
    /**
     * Handle the Pet "creating" event.
     */
    public function creating(Pet $pet): void
    {
        $pet->url = Str::kebab($pet->nome);
    }

    /**
     * Handle the Pet "updating" event.
     */
    public function updating(Pet $pet): void
    {
        $pet->url = Str::kebab($pet->nome);
    }
}
