<?php

namespace Database\Seeders\Condominio\Painel;

use App\Models\Condominio\Painel\Condominio;
use Illuminate\Database\Seeder;

class CondominioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Condominio::create([
            'nome' => 'Condomínio Padrão',
            'email' => 'condominio@email.com',
          ]);
    }
}
