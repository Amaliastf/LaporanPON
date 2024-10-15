<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTimeFinishAndKmFinishNullableInReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Mengubah time_finish dan km_finish menjadi nullable
            $table->time('time_finish')->nullable()->change();
            $table->integer('km_finish')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Mengembalikan time_finish dan km_finish menjadi non-nullable
            $table->time('time_finish')->nullable(false)->change();
            $table->integer('km_finish')->nullable(false)->change();
        });
    }
}
