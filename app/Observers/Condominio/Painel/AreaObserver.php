<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Area;
use Illuminate\Support\Str;

class AreaObserver
{
    /**
     * Handle the Area "creating" event.
     */
    public function creating(Area $area): void
    {
        $area->url = Str::kebab($area->nome);
    }

    /**
     * Handle the Area "updating" event.
     */
    public function updating(Area $area): void
    {
        $area->url = Str::kebab($area->nome);
    }
}
