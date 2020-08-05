<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissoesEmpregoSubItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('missoes_emprego_sub_itens', function (Blueprint $table) {
            $table->id();
            $table->string('sub_item');
            $table->string('cor');
            $table->unsignedBigInteger('missao_emprego_id')->index();
            $table->foreign('missao_emprego_id')->references('id')->on('missoes_emprego')->onDelete('cascade');
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
        Schema::dropIfExists('missoes_emprego_sub_itens');
    }
}
