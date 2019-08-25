<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->tinyIncrements('id');
			$table->unsignedTinyInteger('property_id');
			$table->foreign('property_id')->references('id')->on('properties');
			$table->unsignedTinyInteger('filter_type_id');
			$table->foreign('filtertype_id')->references('id')->on('filter_types');
			$table->unsignedTinyInteger('order');
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
        Schema::dropIfExists('filters');
    }
}
