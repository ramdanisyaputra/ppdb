<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('tingkat');
            $table->string('program');
            $table->string('reg');
            $table->foreignId('peserta_id')->references('id')->on('peserta')->onDelete('cascade');
            $table->string('nisn');
            $table->string('nis');
            $table->string('no_seri_ijazah');
            $table->string('no_seri_skhun');
            $table->string('no_ujian_nasional');
            $table->string('npsn');
            $table->string('agama');
            $table->string('berkebutuhan_khusus');
            $table->string('dusun');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('propinsi');
            $table->string('rt');
            $table->string('rw');
            $table->string('kode_pos');
            $table->string('alat_transportasi');
            $table->string('jenis_tinggal');
            $table->string('no_telp_rumah');
            $table->string('email');
            $table->string('no_kks');
            $table->string('kps');
            $table->string('no_kps')->nullable();
            $table->string('pip');
            $table->string('alasan_layak')->nullable();
            $table->string('kip');
            $table->string('no_kip')->nullable();
            $table->string('nama_kip')->nullable();
            $table->string('alasan_menolak_kip')->nullable();
            $table->string('no_registrasi_akta');
            $table->string('lintang');
            $table->string('bujur');
            $table->string('tahun_lahir_ayah');
            $table->string('berkebutuhan_khusus_ayah');
            $table->string('pendidikan_ayah');
            $table->string('penghasilan_bulanan_ayah');
            $table->string('tahun_lahir_ibu');
            $table->string('berkebutuhan_khusus_ibu');
            $table->string('pendidikan_ibu');
            $table->string('penghasilan_bulanan_ibu');
            $table->string('tahun_lahir_wali')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('jarak_sekolah');
            $table->string('jarak_sekolah_detail');
            $table->string('waktu_tempuh');
            $table->string('waktu_tempuh_detail');
            $table->string('saudara_kandung');
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
        Schema::dropIfExists('dinas');
    }
}
