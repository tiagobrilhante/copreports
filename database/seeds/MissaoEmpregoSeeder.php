<?php

use Illuminate\Database\Seeder;

class MissaoEmpregoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('missoes_emprego')->insert([

            [
                'id' => 1,
                'missao' => 'Defesa Externa',
                'cor' => '#CCCFD1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'missao' => 'GLO',
                'cor' => '#FFFCCC',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'missao' => 'Atribuições Subsidiárias',
                'cor' => '#000000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]


        ]);

    }
}
