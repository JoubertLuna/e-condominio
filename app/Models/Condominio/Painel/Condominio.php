<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'cnpj', 'email', 'fone', 'whatsapp', 'cep', 'logradouro', 'numero', 'uf', 'cidade', 'complemento', 'bairro', 'image', 'facebook', 'twitter', 'linkedin', 'instagram', 'tiktok'];

    public function blocos()
    {
        return $this->hasMany(Bloco::class);
    }

    public function unidades()
    {
        return $this->hasMany(Unidade::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function bancarias()
    {
        return $this->hasMany(Bancaria::class);
    }

    public function patrimonios()
    {
        return $this->hasMany(Patrimonio::class);
    }
}
