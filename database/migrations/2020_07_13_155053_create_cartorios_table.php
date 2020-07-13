<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartorios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('razao', 200);
            $table->string('documento', 14);
            $table->string('cep', 8);
            $table->string('endereco', 400);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->string('telefone', 20)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('tabeliao', 100);
            $table->boolean('ativo')->default(true);
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
        Schema::dropIfExists('cartorios');
    }
}
