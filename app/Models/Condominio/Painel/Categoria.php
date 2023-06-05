<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url'];

    public function contaPagars()
    {
        return $this->hasMany(ContaPagar::class);
    }

    public function contaRecebers()
    {
        return $this->hasMany(ContaReceber::class);
    }
}
