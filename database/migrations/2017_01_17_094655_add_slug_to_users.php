<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // to set the table up
        Schema::table('posts',function($table){ // this is a table property
            // we add the mark up for each individual columns
            // we are going to tell it what column we want to add
            $table->string('slug')->unique()->after('body'); // thats how to create an index


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //the down function
        // we should always have this if we want to roll back
        Schema::table('posts',function($table){
            $table->dropColumn('slug');
        });
    }
}
