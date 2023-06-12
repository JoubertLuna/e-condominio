<?php

namespace Database\Seeders\Condominio\Painel;

use App\Models\Condominio\Painel\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'nome' => 'Super Administrador',
            'role' => 'Role_Super_Administrador',
        ]);
        Role::create([
            'nome' => 'Funcionário',
            'role' => 'Role_Funcionario',
        ]);
        Role::create([
            'nome' => 'Portaria',
            'role' => 'Role_Portaria',
        ]);
        Role::create([
            'nome' => 'Morador',
            'role' => 'Role_Morador',
        ]);
    }
}
