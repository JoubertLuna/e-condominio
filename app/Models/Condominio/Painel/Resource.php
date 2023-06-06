<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'resource', 'url'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
