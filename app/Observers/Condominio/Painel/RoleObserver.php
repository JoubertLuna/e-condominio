<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\Role;
use Illuminate\Support\Str;

class RoleObserver
{
    /**
     * Handle the Role "creating" event.
     */
    public function creating(Role $role): void
    {
        $role->url = Str::kebab($role->nome);
    }

    /**
     * Handle the Role "updating" event.
     */
    public function updating(Role $role): void
    {
        $role->url = Str::kebab($role->nome);
    }
}
