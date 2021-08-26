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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('username')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger("persona_id");
            $table->foreign("persona_id")->references("id")->on("persona")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('password');
            $table->string('rol');
            $table->tinyInteger('estado');
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
        Schema::dropIfExists('users');
    }
}