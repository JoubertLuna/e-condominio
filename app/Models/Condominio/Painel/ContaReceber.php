<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaReceber extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'categoria_id', 'data', 'bancaria_id', 'valor', 'pago', 'bloco_id', 'unidade_id', 'user_id', 'obs'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function bancaria()
    {
        return $this->belongsTo(Bancaria::class);
    }

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
