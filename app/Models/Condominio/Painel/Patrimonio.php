<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'url', 'condominio_id'];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }
}
