<?php

namespace App\Observers\Condominio\Painel;

use App\Models\Condominio\Painel\User;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        $user->url = Str::kebab($user->name);
    }

    /**
     * Handle the User "updating" event.
     */
    public function updating(User $user): void
    {
        $user->url = Str::kebab($user->name);
    }
}
