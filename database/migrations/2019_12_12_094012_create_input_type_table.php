<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name",60)->unique();
            $table->timestamps();
        });

        Schema::create('input_type_parameter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('input_type_id')->unsigned();
            $table->string('name',60);
            $table->string('description',255);
            $table->boolean('required')->default(0);
            $table->timestamps();

            $table->foreign('input_type_id')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_type');
        Schema::dropIfExists('input_type_parameter');
    }
}
