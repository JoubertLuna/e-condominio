<?php

namespace Database\Seeders;

use Database\Seeders\Condominio\Painel\{
    BlocoSeeder,
    CondominioSeeder,
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
            CondominioSeeder::class,
            BlocoSeeder::class,
            UnidadeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
