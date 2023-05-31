<?php

namespace Database\Seeders\Condominio\Painel;

use App\Models\Condominio\Painel\Condominio;
use Illuminate\Database\Seeder;

class BlocoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $condominio = Condominio::first();

        $condominio->blocos()->create([
            'nome' => 'Bloco Padrão',
        ]);
    }
}
