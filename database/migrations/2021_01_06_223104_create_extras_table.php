<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->foreignId('origin_electronic_item_id')->constrained('electronic_items');
            $table->foreignId('destination_electronic_item_id')->constrained('electronic_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extras', function (Blueprint $table) {
            $table->dropForeign(['origin_electronic_item_id']);
            $table->dropForeign(['destination_electronic_item_id']);
        });
        Schema::dropIfExists('extras');
    }
}
