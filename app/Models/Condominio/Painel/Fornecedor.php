<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = ['razao_social', 'url', 'nome_fantasia', 'cpf', 'cnpj', 'data_cadastro', 'ativo', 'fone', 'celular', 'email', 'cep', 'logradouro', 'numero', 'uf', 'cidade', 'complemento', 'bairro', 'rg'];

    public function ContasPagar()
    {
        return $this->hasMany(ContaPagar::class);
    }
}
