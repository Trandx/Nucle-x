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
            $table->uuid("id")->primary();
            $table->string("social_id")->nullable();
            $table->string("first_name")->nullable();
            $table->string('last_name');
            $table->string('username')->unique()->nullable();
            $table->jsonb('email')->nullable();
            $table->jsonb('phones')->nullable();
            $table->jsonb('avatar')->nullable();
            $table->date("birthday")->nullable()->index();
            $table->string('password');
            $table->boolean('email_verified')->default(false);
            $table->boolean('phone_verified')->default(false);
            $table->boolean('account_actived')->default(false);
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
