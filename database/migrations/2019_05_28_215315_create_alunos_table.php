<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id_aluno');
            $table->timestamps();
            $table->string("nome",255);
            $table->date("data_nascimento");
            $table->date("data_criacao");
            $table->string("logradouro");
            $table->string("numero");
            $table->string("bairro");
            $table->string("cidade");
            $table->string("estado");
            $table->string("cep");
            $table->bigInteger("id_curso");

            $table->foreign("id_curso")
                ->references("id_curso")
                ->on("cursos");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
