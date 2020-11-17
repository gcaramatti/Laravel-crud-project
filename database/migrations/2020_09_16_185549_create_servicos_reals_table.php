<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;
class CreateServicosRealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos_reals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NomeServico');
            $table->string('DescricaoServico');
            $table->string('NomeColaborador')->nullable();
            $table->date('DataFim')->nullable();
            $table->string('status');
            $table->integer('user_id');
            $table->integer('created_by');
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
        Schema::dropIfExists('servicos_reals');
    }
}
