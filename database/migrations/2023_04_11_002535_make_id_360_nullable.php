<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeId360Nullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informations', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->string('identifier_360')->nullable()->change();

        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informations', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->string('identifier_360')->change();


        });
        Schema::enableForeignKeyConstraints();

    }
}
