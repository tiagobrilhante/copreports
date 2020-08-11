<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaoSubDivisoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('acao_sub_divisoes', function (Blueprint $table) {
            $table->id();
            $table->string('sub_divisao');
            $table->string('cor');
            $table->unsignedBigInteger('acao_id')->index();
            $table->foreign('acao_id')->references('id')->on('acoes')->onDelete('cascade');
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
        Schema::dropIfExists('acao_sub_divisoes');
    }
}
