<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('order')->nullable();
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->integer('parent')->nullable()->unsigned();
            $table->foreign('parent')->references('id')->on('forms')->onDelete('cascade');
            $table->timestamps();
        });
        // Schema::table('forms', function($table) {
        //     $table->foreign('menu_id')->references('id')->on('menus');
        // });
        // Schema::table('forms', function($table) {
        //     $table->foreign('parent')->references('id')->on('forms');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
