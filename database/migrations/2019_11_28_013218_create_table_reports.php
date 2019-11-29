<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('survivor_reporter_id');
            $table->integer('survivor_infected_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('survivor_reporter_id')->references('id')->on('survivors');
            $table->foreign('survivor_infected_id')->references('id')->on('survivors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
