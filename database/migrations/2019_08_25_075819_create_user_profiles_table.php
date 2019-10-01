<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_account_id');
			$table->foreign('user_account_id')->references('id')->on('users');
			$table->string("phone");
			$table->string("address");
            $table->date("dob");
			$table->string("avatar");
			$table->unsignedTinyInteger("privilege");
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
        Schema::dropIfExists('user_profiles');
    }
}
