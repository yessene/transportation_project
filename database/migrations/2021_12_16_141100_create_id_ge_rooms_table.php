<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateIdGeRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_ge_rooms', function (Blueprint $table) {
            $table->id();
            // Add your table columns here
            $table->timestamps();
        });

        DB::statement('CREATE TRIGGER `id_store_room` BEFORE INSERT ON `id_ge_rooms` FOR EACH ROW SET NEW.id = UUID()');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TRIGGER IF EXISTS `id_store_room`');
        Schema::dropIfExists('id_ge_rooms');
    }
}
