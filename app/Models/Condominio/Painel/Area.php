<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url'];

    public function assembleias()
    {
        return $this->hasMany(Assembleia::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
