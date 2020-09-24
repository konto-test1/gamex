<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            //name który będzie pamięta które to menu np. header, footer itd.
            $table->string('menu_id');
            $table->string('page_name');
            $table->string('parents_items')->nullable();
            $table->string('page_number')->nullable();
            // tutaj relacja page_id do rodzica czyli parent_ID (moze byc pusty bo moze nie miec rodzica)
            $table->string('page_title');
            $table->string('page_parent')->nullable();
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
        Schema::dropIfExists('menu_items');
    }
}
