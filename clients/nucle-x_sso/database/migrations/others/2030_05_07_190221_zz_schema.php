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
        Schema::table('books', function( Blueprint $table){
            $table->foreignId('category_id')->index()->constrained('categories')->onUpdate('cascade');

        });

        Schema::table('comments', function( Blueprint $table){
            $table->foreignId('book_id')->index()->constrained('books')->onUpdate(('cascade'));
        });

        Schema::table('token_socialites', function( Blueprint $table){
            //$table->foreignId('user_id')->index()->constrained('users')->onUpdate('cascade');
            $table->uuid("user_id")->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
        });

        Schema::table('pin_codes', function( Blueprint $table){
            //$table->foreignId('user_id')->index()->constrained('users')->onUpdate('cascade');
            $table->uuid("user_id")->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function(Blueprint $table){
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::table('comments', function(Blueprint $table){
            $table->dropForeign(['book_id']);
            $table->dropColumn('book_id');
        });

        Schema::table('token_socialites', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('pin_codes', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });


    }
}
