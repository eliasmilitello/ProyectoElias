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
        schema::create('usuarios',function(blueprint $table){
            $table->increments('idu');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('user',40);
            $table->string('pasw',30);
            $table->integer('idRoles')->unsigned();
            $table->foreign('idRoles')->references('idRoles')->on('roles');
            $table->string('activo',10);
            $table->rememberToken();
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
        schema::drop('usuarios');
    }
};
