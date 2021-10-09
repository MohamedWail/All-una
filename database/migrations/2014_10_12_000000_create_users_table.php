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
            $table->id();
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->default();
            $table->date('date_of_birth')->nullable();
            $table->string('role');
            $table->string('status')->default('pending');
            $table->string('path_of_id')->default('');
            $table->string('firebase_token')->default('');
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
