<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->length(191);
            $table->string('surname')->length(191);
            $table->string('phone')->length(191);
            $table->string('email')->unique()->length(191);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamp('last_sesion')->nullable();
            $table->string('token_login')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //Rol
            $table->unsignedBigInteger('rol_id');
            $table->foreign("rol_id")
                ->references("id")
                ->on("roles")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
