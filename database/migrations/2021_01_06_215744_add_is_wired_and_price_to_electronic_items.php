<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsWiredAndPriceToElectronicItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('electronic_items', function (Blueprint $table) {
            $table->boolean('is_single_purchasable')->after('name')->default(true);
            $table->boolean('is_wired')->after('name')->default(false);
            $table->decimal('price')->after('name')->default(0.0);
            $table->string('image', 1000)->nullable(true);
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
            $table->dropColumn('image');
            $table->dropColumn('price');
            $table->dropColumn('is_wired');
            $table->dropColumn('is_single_purchasable');
        });
    }
}
