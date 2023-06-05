<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaPagar extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'data', 'categoria_id', 'bancaria_id', 'valor', 'pago', 'fornecedor_id', 'obs'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function bancaria()
    {
        return $this->belongsTo(Bancaria::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
