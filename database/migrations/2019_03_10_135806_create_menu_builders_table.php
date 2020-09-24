<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuBuildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_builders', function (Blueprint $table) {

            $table->increments('id');
            // $table->increments('id')->unsigned();
            // $table->integer('user_id')->unsigned();
            // $table->increments('id')->references('menu_id')->on('menu_items')->onDelete('cascade');
            // $table->integer('test')->unsigned();
            // $table->foreign('test')->references('menu_id')->on('menu_items')->onDelete('cascade');
            $table->string('menu_title');
            $table->string('menu_desc');
            // $table->integer('id')->unsigned();
            // $table->foreign('id')->references('menu_id')->on('menu_items')->onDelete('cascade');
            $table->timestamps(); 
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_builders');
    }
}
