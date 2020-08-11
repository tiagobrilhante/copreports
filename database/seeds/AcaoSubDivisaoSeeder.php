<?php

use Illuminate\Database\Seeder;

class AcaoSubDivisaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acao_sub_divisoes')->insert([

            [
                'id' => 1,
                'sub_divisao' => 'Terrestre',
                'cor' => corAleatoria(),
                'acao_id'=>1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'sub_divisao' => 'Aeromóvel',
                'cor' => corAleatoria(),
                'acao_id'=>1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'sub_divisao' => 'Terrestre',
                'cor' => corAleatoria(),
                'acao_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'sub_divisao' => 'Aeromóvel',
                'cor' => corAleatoria(),
                'acao_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'sub_divisao' => 'Naval',
                'cor' => corAleatoria(),
                'acao_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'sub_divisao' => 'Urbano',
                'cor' => corAleatoria(),
                'acao_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'sub_divisao' => 'Rural',
                'cor' => corAleatoria(),
                'acao_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]

        ]);

    }
}
