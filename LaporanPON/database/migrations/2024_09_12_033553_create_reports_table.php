<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->date('tanggal'); // Tanggal laporan
            $table->time('time_start'); // Waktu mulai
            $table->time('time_finish'); // Waktu selesai
            $table->integer('km_start'); // Kilometer awal
            $table->integer('km_finish'); // Kilometer akhir
            $table->text('description')->nullable(); // Deskripsi bisa null
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
