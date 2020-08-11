<?php

use Illuminate\Database\Seeder;

class AcaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acoes')->insert([

            [
                'id' => 1,
                'acao' => 'Patrulhamento',
                'cor' => '#CCCFD1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'acao' => 'Reconhecimento',
                'cor' => '#FFFCCC',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'acao' => 'PBCE',
                'cor' => '#000000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]


        ]);

    }
}
