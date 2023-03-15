<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFigmaMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('figma_maps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('campus');
            $table->string('file_name');
            $table->string('file_key');
            $table->string('node_id');
            $table->string('viewport')->nullable();
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
        Schema::dropIfExists('figma_maps');
    }
}
