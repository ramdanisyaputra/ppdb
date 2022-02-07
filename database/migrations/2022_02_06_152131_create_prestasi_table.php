<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dinas_id')->references('id')->on('dinas')->onDelete('cascade');
            $table->string('jenis_prestasi')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('nama_prestasi')->nullable();
            $table->string('tahun')->nullable();
            $table->string('penyelenggaraan')->nullable();
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
        Schema::dropIfExists('prestasi');
    }
}
