<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name_society');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('address');
            $table->string('type');
            $table->string('email');
            $table->string('country');
            $table->string('city')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('relation_date')->nullable();
            $table->string('notes')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();



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
        Schema::dropIfExists('clients');
    }
}
