<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sigla');
            $table->string('cor');
            $table->boolean('podeVerTudo');
            $table->boolean('podeCriarRelatorio');
            $table->boolean('novoNo');
            $table->integer('parent');


            $table->unsignedBigInteger('om_id')->nullable();
            $table->foreign('om_id')->references('id')->on('oms')->onDelete('cascade');

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
        Schema::dropIfExists('oms');
    }
}
