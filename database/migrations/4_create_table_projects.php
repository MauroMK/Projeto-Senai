<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name", 255);
            $table->string("tipo");
            $table->string("prioridade");
            $table->boolean("situacao")->default(true);
            $table->boolean("finalizado")->default(false);
            $table->text("descricao")->nullable();
            $table->text("observacao")->nullable();
            $table->dateTime("data_alteracao")->nullable();
            $table->string("responsavel_alteracao", 255)->nullable();
            $table->bigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_projects');
    }
};
