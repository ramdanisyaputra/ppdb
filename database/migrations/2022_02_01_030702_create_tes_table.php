<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->references('id')->on('sekolah')->onDelete('cascade');
            $table->string('judul');
            $table->integer('durasi');
            $table->enum('status',[0,1]);
            $table->foreignId('panitia_id')->nullable()->references('id')->on('panitia')->onDelete('cascade');
            $table->enum('status_acak',[0,1]);
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
        Schema::dropIfExists('tes');
    }
}
