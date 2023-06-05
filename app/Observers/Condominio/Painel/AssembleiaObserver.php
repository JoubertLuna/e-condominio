<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Assembleia;
use Illuminate\Support\Str;

class AssembleiaObserver
{
    /**
     * Handle the Assembleia "creating" event.
     */
    public function creating(Assembleia $assembleia): void
    {
        $assembleia->url = Str::kebab($assembleia->titulo);
    }

    /**
     * Handle the Assembleia "updating" event.
     */
    public function updating(Assembleia $assembleia): void
    {
        $assembleia->url = Str::kebab($assembleia->titulo);
    }
}
