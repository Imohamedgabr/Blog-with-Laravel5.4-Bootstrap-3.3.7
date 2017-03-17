<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // the column to be added after slug column
            $table->integer('category_id')->nullable()->after('slug')->unsigned();

            // //you can add this manually if you are only using MYISAM but its kinda slower
            // // we connect tables using php which is better by laravel
            // $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // incase we need to rollback our database
            $table->dropColumn('category_id');
        });
    }
}
