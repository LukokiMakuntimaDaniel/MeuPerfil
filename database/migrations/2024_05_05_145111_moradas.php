<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Moradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("moradas",function(Blueprint $table){
            $table->id();
            $table->foreignId("usuario_id");
            $table->string("rua");
            $table->string("bairro");
            $table->string("estado");
            $table->foreign("usuario_id")->references("id")->on("usuarios");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists("moradas");
    }
}
