<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectronicTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronic_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('maximum_extras')->default(0);
            $table->timestamps();
        });

        if (\Schema::hasTable('electronic_types')) {
            \DB::table('electronic_types')->insert([
                [
                    'name'           => 'Console',
                    'slug'           => 'console',
                    'maximum_extras' => 4,
                    'created_at'     => now()->toDateTimeString(),
                    'updated_at'     => now()->toDateTimeString(),
                ],
                [
                    'name'           => 'Television',
                    'slug'           => 'television',
                    'maximum_extras' => 99999,
                    'created_at'     => now()->toDateTimeString(),
                    'updated_at'     => now()->toDateTimeString(),
                ],
                [
                    'name'           => 'Microwave',
                    'slug'           => 'microwave',
                    'maximum_extras' => 0,
                    'created_at'     => now()->toDateTimeString(),
                    'updated_at'     => now()->toDateTimeString(),
                ],
                [
                    'name'           => 'Controller',
                    'slug'           => 'controller',
                    'maximum_extras' => 0,
                    'created_at'     => now()->toDateTimeString(),
                    'updated_at'     => now()->toDateTimeString(),
                ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electronic_types');
    }
}
