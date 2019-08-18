<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robots', function (Blueprint $table) {
            $table->bigIncrements('id')->unique;
			$table->string('name');
			$table->string('source');
			$table->date('year');
			$table->string('author');
			$table->text('description');
			$table->string('purpose');
			$table->string('motivation');
			$table->string('size');
			$table->string('shape');
			$table->string('awards');
			$table->binary('multimedia');
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
        Schema::dropIfExists('robots');
    }
}

