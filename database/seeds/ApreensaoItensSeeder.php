<?php

use Illuminate\Database\Seeder;

class ApreensaoItensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apreensao_itens')->insert([
            [
                'id' => 1,
                'nome' => 'Automóvel de Passeio',
                'apreensao_categoria_id' => 1,
                'forma_medir' => 'Unidades',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'nome' => 'Caminhão',
                'forma_medir' => 'Unidades',
                'apreensao_categoria_id' => 1,
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'nome' => 'Trator',
                'apreensao_categoria_id' => 1,
                'forma_medir' => 'Unidades',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'nome' => 'Voadeira',
                'apreensao_categoria_id' => 2,
                'forma_medir' => 'Unidades',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'nome' => 'Monomotor',
                'apreensao_categoria_id' => 3,
                'cor' => corAleatoria(),
                'forma_medir' => 'Unidades',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'nome' => 'Bi-motor',
                'apreensao_categoria_id' => 3,
                'cor' => corAleatoria(),
                'forma_medir' => 'Unidades',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'nome' => 'Maconha',
                'apreensao_categoria_id' => 4,
                'cor' => corAleatoria(),
                'forma_medir' => 'kg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'nome' => 'Cocaina',
                'apreensao_categoria_id' => 4,
                'forma_medir' => 'Kg',
                'cor' => corAleatoria(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'nome' => 'Madeira de Lei',
                'apreensao_categoria_id' => 5,
                'cor' => corAleatoria(),
                'forma_medir' => 'M³',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'nome' => 'Madeira Comum',
                'apreensao_categoria_id' => 5,
                'cor' => corAleatoria(),
                'forma_medir' => 'M³',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'nome' => 'Cigarros',
                'apreensao_categoria_id' => 6,
                'cor' => corAleatoria(),
                'forma_medir' => 'Kg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);

    }
}
