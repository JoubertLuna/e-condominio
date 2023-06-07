<?php

namespace Database\Seeders\Condominio\Painel;

use App\Models\Condominio\Painel\{
    Bloco,
    Condominio,
    Role,
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

        $RoleAdministrador = Role::first()->id;
        $RoleMorador = Role::find('2')->id;
        $RolePortaria = Role::find('3')->id;

        User::create([
            'name' => 'Administrador - e-condomínio',
            'email' => 'administrador@condominio.com',
            'password' => Hash::make('@admin123'),
            'condominio_id' => $condominio,
            'bloco_id' => $bloco,
            'unidade_id' => $unidade,
            'role_id' => $RoleAdministrador,
        ]);

        User::create([
            'name' => 'Morador - e-condomínio',
            'email' => 'morador@condominio.com',
            'password' => Hash::make('@morador123'),
            'condominio_id' => $condominio,
            'bloco_id' => $bloco,
            'unidade_id' => $unidade,
            'role_id' => $RoleMorador,
        ]);

        User::create([
            'name' => 'Portaria - e-condomínio',
            'email' => 'portaria@condominio.com',
            'password' => Hash::make('@portaria123'),
            'condominio_id' => $condominio,
            'bloco_id' => $bloco,
            'unidade_id' => $unidade,
            'role_id' => $RolePortaria,
        ]);
    }
}
