<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'bloco_id'];

    public function bloco()
    {
        return $this->belongsTo(Bloco::class);
    }

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function visitantes()
    {
        return $this->hasMany(Visitante::class);
    }
}
