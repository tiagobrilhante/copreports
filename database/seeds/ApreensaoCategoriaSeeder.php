<?php

use Illuminate\Database\Seeder;

class ApreensaoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apreensao_categorias')->insert([
            [
                'id' => 1,
                'nome' => 'Veículos',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'nome' => 'Embarcações',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'nome' => 'Aeronaves',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'nome' => 'Drogas',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'nome' => 'Madeira',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'nome' => 'Outros',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);

    }
}
