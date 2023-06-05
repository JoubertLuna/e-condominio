<?php

namespace App\Models\Condominio\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assembleia extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'url' , 'ordem_dia', 'data', 'hora', 'area_id'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
