<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->references('id')->on('peserta')->onDelete('cascade');
            $table->string('panggilan');
            $table->string('nik');
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('ttl');
            $table->string('asal_sekolah');
            $table->string('kelas');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_telp_ayah');
            $table->string('no_telp_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('alamat');
            $table->foreignId('sekolah_id')->references('id')->on('sekolah')->onDelete('cascade');
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
        Schema::dropIfExists('profil');
    }
}
