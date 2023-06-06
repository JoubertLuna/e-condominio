<?php

namespace Database\Seeders;

use Database\Seeders\Condominio\Painel\{
    BlocoSeeder,
    CondominioSeeder,
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
            CondominioSeeder::class,
            BlocoSeeder::class,
            UnidadeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
