<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_tes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tes_id')->references('id')->on('tes')->onDelete('cascade');
            $table->string('soal');
            $table->json('opsi');
            $table->text('jawaban');
            $table->float('poin')->nullable();
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
        Schema::dropIfExists('soal_tes');
    }
}
