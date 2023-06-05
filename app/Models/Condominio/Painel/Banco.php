<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nome', 'url'];

    public function bancarias()
    {
        return $this->hasMany(Bancaria::class);
    }
}
