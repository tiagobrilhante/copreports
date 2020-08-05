<?php

use Illuminate\Database\Seeder;

class MissaoEmpregoSubItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('missoes_emprego_sub_itens')->insert([

            [
                'id' => 1,
                'sub_item' => 'Preparo',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'sub_item' => 'Emprego',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'sub_item' => 'Comum',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'sub_item' => 'Ambiental',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'sub_item' => 'GVA',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'sub_item' => 'Op Faixa de Fronteira',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'sub_item' => 'Combate a Doenças',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'sub_item' => 'Melhoria e/ou Expansão da Infraestrutura Nacional',
                'cor' => corAleatoria(),
                'missao_emprego_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

        ]);

    }
}
