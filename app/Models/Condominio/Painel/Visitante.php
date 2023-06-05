<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'rg', 'cpf', 'bloco_id', 'unidade_id', 'user_id', 'data_entrada', 'hora_entrada', 'data_saida', 'hora_saida', 'obs', 'image'];

    public function bloco()
    {
        return $this->belongsTo(Bloco::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
