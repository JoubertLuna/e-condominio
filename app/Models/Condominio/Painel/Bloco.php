<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'condominio_id'];

    # Relacionamento
    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function unidades()
    {
        return $this->hasMany(Unidade::class);
    }

    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function visitantes()
    {
        return $this->hasMany(Visitante::class);
    }

    public function contaRecebers()
    {
        return $this->hasMany(ContaReceber::class);
    }
}
