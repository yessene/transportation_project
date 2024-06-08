<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGenaCusIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gena_cus_ids', function (Blueprint $table) {
            $table->id();
            // Add your table columns here
            $table->timestamps();
        });

        DB::statement('CREATE TRIGGER `id_store_cus` BEFORE INSERT ON `gena_cus_ids` FOR EACH ROW SET NEW.id = UUID()');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TRIGGER IF EXISTS `id_store_cus`');
        Schema::dropIfExists('gena_cus_ids');
    }
}
