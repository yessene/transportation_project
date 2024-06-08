<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            /*there are 28*/
            $table->string('Last_Name');
            $table->string('First_Name');
            $table->string('Date_of_Birth');
            $table->string('ID_Number');
            $table->string('Phone')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Address')->nullable();
            $table->string('Marital_Status')->nullable();
            $table->string('Transport')->nullable();
            $table->string('City')->nullable();
            $table->string('Registration_Number');
            $table->string('Hire_Date')->nullable();
            $table->string('Departure_Date')->nullable();
           
            $table->string('Social_Security')->nullable();
            
            $table->string('type');



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
        Schema::dropIfExists('drivers');
    }
}
