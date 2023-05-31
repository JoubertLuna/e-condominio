<?php

namespace Database\Seeders\Condominio\Painel;

use App\Models\Condominio\Painel\{
    Bloco,
    Condominio,
    Unidade,
    User
};

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $condominio = Condominio::first()->id;
        $bloco = Bloco::first()->id;
        $unidade = Unidade::first()->id;

        User::create([
            'name' => 'Administrador - e-condomínio',
            'email' => 'administrador@condominio.com',
            'password' => Hash::make('@admin123'),
            'condominio_id' => $condominio,
            'bloco_id' => $bloco,
            'unidade_id' => $unidade,
        ]);

        User::create([
            'name' => 'Morador - e-condomínio',
            'email' => 'morador@condominio.com',
            'password' => Hash::make('@morador123'),
            'condominio_id' => $condominio,
            'bloco_id' => $bloco,
            'unidade_id' => $unidade,
        ]);

        User::create([
            'name' => 'Porteiro - e-condomínio',
            'email' => 'porteiro@condominio.com',
            'password' => Hash::make('@porteiro123'),
            'condominio_id' => $condominio,
            'bloco_id' => $bloco,
            'unidade_id' => $unidade,
        ]);
    }
}
