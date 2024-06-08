<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleBodyTotravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->string('con');
            $table->string('provenance')->nullable();
            $table->string('destination')->nullable();
            $table->string('date_exit')->nullable();
            $table->string('date_arrivee')->nullable();
           
            $table->string('kilometers')->nullable();
           
            $table->string('sales')->nullable();
            $table->string('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travels', function (Blueprint $table) {
            //
        });
    }
}
