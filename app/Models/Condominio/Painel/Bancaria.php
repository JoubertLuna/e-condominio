<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bancaria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'tipo_conta', 'agencia', 'numero', 'digito', 'banco_id', 'condominio_id'];


    public function banco()
    {
        return $this->belongsTo(Banco::class);
    }

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function contaPagars()
    {
        return $this->hasMany(ContaPagar::class);
    }

    public function contaRecebers()
    {
        return $this->hasMany(ContaReceber::class);
    }
}
