<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableResources extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('quantity');
            $table->integer('survivor_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('survivor_id')->references('id')->on('survivors');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('resources');
    }
}
