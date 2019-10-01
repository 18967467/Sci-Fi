<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobotsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robots_info', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('robot_id');
			$table->foreign('robot_id')->references('id')->on('robots');
			$table->unsignedTinyInteger('property_id');
			$table->foreign('property_id')->references('id')->on('properties');
			$table->string('content');
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
        Schema::dropIfExists('robots_info');
    }
}
