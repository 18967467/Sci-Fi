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
            $table->unsignedTinyInteger('property_id')->unique();
            $table->unsignedTinyInteger('input_type_id');
            $table->unsignedTinyInteger('order');
                // 0: inactive
                // >1: display orders
            $table->timestamps();
            
            $table->foreign('property_id')->references('id')->on('properties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('input_type_id')->references('id')->on('input_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filters', function (Blueprint $table) {
            $table->dropForeign(['property_id']);
            $table->dropForeign(['input_type_id']);
        });
        Schema::dropIfExists('filters');
    }
}
