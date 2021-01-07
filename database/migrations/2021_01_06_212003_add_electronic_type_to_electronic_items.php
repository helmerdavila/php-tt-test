<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddElectronicTypeToElectronicItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('electronic_items', function (Blueprint $table) {
            $table->foreignId('electronic_type_id')->after('id')->constrained('electronic_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('electronic_items', function (Blueprint $table) {
            $table->dropForeign(['electronic_type_id']);
        });
    }
}
