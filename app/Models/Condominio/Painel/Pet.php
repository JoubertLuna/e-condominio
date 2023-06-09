<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'especie', 'sexo', 'raca', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
