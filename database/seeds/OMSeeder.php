<?php

use Illuminate\Database\Seeder;

class OMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oms')->insert([

            [
                'id' => 1,
                'name' => 'Comando Militar da Amazônia',
                'sigla' => 'CMA',
                'parent' => 0,
                'om_id' => null,
                'cor' => '#FFF000',
                'podeVerTudo' => 1,
                'podeCriarRelatorio' => 0,
                'podeHomologarRelatorio' => 1,
                'podeCriarMaster' => 1,
                'novoNo' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => '12ª Região Militar',
                'sigla' => '12ª RM',
                'cor' => '#DDDCCC',
                'parent' => 1,
                'om_id' => 1,
                'podeVerTudo' => 0,
                'podeCriarRelatorio' => 0,
                'podeHomologarRelatorio' => 0,
                'podeCriarMaster' => 0,
                'novoNo' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => '1ª Brigada de Infantaria de Selva',
                'sigla' => '1ª Bda Inf Sl',
                'cor' => '#DDDCCC',
                'parent' => 1,
                'om_id' => 1,
                'podeVerTudo' => 0,
                'podeCriarRelatorio' => 0,
                'podeHomologarRelatorio' => 0,
                'podeCriarMaster' => 0,
                'novoNo' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'name' => '17ª Brigada de Infantaria de Selva',
                'sigla' => '17ª Bda Inf Sl',
                'cor' => '#C2C3C4',
                'parent' => 1,
                'om_id' => 1,
                'podeVerTudo' => 0,
                'podeCriarRelatorio' => 0,
                'podeHomologarRelatorio' => 0,
                'podeCriarMaster' => 0,
                'novoNo' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'name' => '16ª Brigada de Infantaria de Selva',
                'sigla' => '16ª Bda Inf Sl',
                'cor' => '#b2b3b4',
                'parent' => 1,
                'om_id' => 1,
                'podeVerTudo' => 0,
                'podeCriarRelatorio' => 0,
                'podeHomologarRelatorio' => 0,
                'podeCriarMaster' => 0,
                'novoNo' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'name' =>  '5º Batalhão de Infantaria de Selva',
                'sigla' => '5º BIS',
                'cor' => '#654321',
                'parent' => 4,
                'om_id' => 4,
                'podeVerTudo' => 0,
                'podeCriarRelatorio' => 1,
                'podeHomologarRelatorio' => 1,
                'podeCriarMaster' => 0,
                'novoNo' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'name' => '6º Batalhão de Infantaria de Selva',
                'sigla' => '6º BIS',
                'cor' => '#BBBCCC',
                'parent' => 4,
                'om_id' => 4,
                'podeVerTudo' => 0,
                'podeCriarRelatorio' => 1,
                'podeHomologarRelatorio' => 1,
                'podeCriarMaster' => 0,
                'novoNo' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]

        ]);

    }
}
