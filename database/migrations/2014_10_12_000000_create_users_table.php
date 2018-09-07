<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // php artisan migrate
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
//            $table->integer('role_id'); //tabla a la que se quiere relacion en singular y _id
            $table->rememberToken(); //este valor puede ser nulo
            $table->timestamps(); //los campos de fecha y hora de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // php artisan migrate:rollback
    {
        Schema::dropIfExists('users');
    }
}
