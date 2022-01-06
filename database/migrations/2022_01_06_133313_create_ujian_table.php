<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_ujian', function (Blueprint $table) {
            $table->char('kode_kategori', 2)->primary();
            $table->string('nama_kategori', 20);
            $table->timestamps();
        });
        Schema::create('ujian', function (Blueprint $table) {
            $table->char('kode_ujian', 12);
            $table->char('kode_mapel', 7);
            $table->char('kode_kalender', 8);
            $table->char('kode_kategori', 2);
            $table->date('tgl_ujian');
            $table->char('jam_ujian', 5);
            $table->char('durasi', 3);
            $table->timestamps();
            $table->primary(['kode_ujian','kode_mapel','kode_kalender','kode_kategori']);
            $table->foreign('kode_mapel')->references('kode_mapel')->on('mata_pelajaran');
            $table->foreign('kode_kalender')->references('kode_kalender')->on('kalender_akademik');
            $table->foreign('kode_kategori')->references('kode_kategori')->on('kategori_ujian');
        });
        Schema::create('peserta_ujian', function (Blueprint $table) {
            $table->char('nisn', 10);
            $table->char('kode_kelas', 8);
            $table->char('kode_ujian', 12);
            $table->timestamps();
            $table->primary(['nisn', 'kode_kelas', 'kode_ujian']);
            $table->foreign('nisn')->references('nisn')->on('siswa');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas');
            $table->foreign('kode_ujian')->references('kode_ujian')->on('ujian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_ujian');
        Schema::dropIfExists('ujian');
        Schema::dropIfExists('peserta_ujian');
    }
}
