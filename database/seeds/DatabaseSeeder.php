<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OMSeeder::Class,
            UserSeeder::Class,
            UserTipoSeeder::Class,
            TokenSeeder::Class,
            MissaoEmpregoSeeder::Class,
            MissaoEmpregoSubItemSeeder::Class,
            AcaoSeeder::Class,
            AcaoSubDivisaoSeeder::Class,
            ApreensaoCategoriaSeeder::Class,
            ApreensaoItensSeeder::Class,
        ]);
    }
}
