<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApreensaoItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('apreensao_itens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cor');
            $table->string('forma_medir');
            $table->unsignedBigInteger('apreensao_categoria_id')->index();
            $table->foreign('apreensao_categoria_id')->references('id')->on('apreensao_categorias')->onDelete('cascade');
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
        Schema::dropIfExists('apreensao_itens');
    }
}
