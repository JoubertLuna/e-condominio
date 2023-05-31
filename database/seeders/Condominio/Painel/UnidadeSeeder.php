<?php

namespace Database\Seeders\Condominio\Painel;

use App\Models\Condominio\Painel\Bloco;
use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloco = Bloco::first();

        $bloco->unidades()->create([
            'nome' => 'Unidade Padrão',
        ]);
    }
}
