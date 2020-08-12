<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadoApreensoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('resultado_apreensoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quantidade');
            $table->date('data_apreensao');
            $table->string('quem_apreendeu');
            $table->longText('observacao');
            $table->longText('motivo');
            $table->string('cor');

            $table->unsignedBigInteger('item_categoria_id')->index();
            $table->foreign('item_categoria_id')->references('id')->on('apreensao_categorias')->onDelete('cascade');

            $table->unsignedBigInteger('item_apreendido_id')->index();
            $table->foreign('item_apreendido_id')->references('id')->on('apreensao_itens')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultado_apreensoes');
    }
}


