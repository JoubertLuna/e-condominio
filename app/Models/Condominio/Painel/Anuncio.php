<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'data', 'descricao', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
