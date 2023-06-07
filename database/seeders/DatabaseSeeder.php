<?php

namespace Database\Seeders;

use Database\Seeders\Condominio\Painel\{
    BlocoSeeder,
    CondominioSeeder,
    ResourceRoleSeeder,
    ResourceSeeder,
    RoleSeeder,
    UnidadeSeeder,
    UserSeeder,
};

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ResourceSeeder::class,
            ResourceRoleSeeder::class,
            CondominioSeeder::class,
            BlocoSeeder::class,
            UnidadeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
