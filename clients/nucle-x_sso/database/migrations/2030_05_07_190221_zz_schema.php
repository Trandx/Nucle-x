<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ZzSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('admins', function( Blueprint $table){
        //     $table->foreignId('users_id')->index()->constrained('users')->onUpdate('cascade');

        // });

        Schema::table('role_users', function( Blueprint $table){
            $table->uuid('user_id')->index();
            $table->uuid('role_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnUpdate();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_users', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });


    }
}
