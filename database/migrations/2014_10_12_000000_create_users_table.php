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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usertype');
            $table->string('password');
            $table->string('company_name')->default('')->nullable();
            $table->string('phone')->default('')->nullable();
            $table->string('address1')->default('')->nullable();
            $table->string('address2')->default('')->nullable();
            $table->string('city')->default('')->nullable();
            $table->string('state')->default('')->nullable();
            $table->string('zip')->default('')->nullable();
            $table->rememberToken()->nullable();
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
