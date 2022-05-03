<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_user_id');
            $table->foreign('employer_user_id')->references('id')->on('employer_users')->onDelete('cascade');
            $table->string('company')->unique();
            $table->string('location');
            $table->text('description');
            $table->string('email')->unique();
            $table->string('logo')->default('default_logo.jpg');
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
        Schema::dropIfExists('employers');
    }
}
