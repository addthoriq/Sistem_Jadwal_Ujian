<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSiswaKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->primary();
            $table->string('nama_siswa', 50);
            $table->char('jenis_kelamin', 2);
            $table->string('avatar')->nullable();
            $table->enum('status', ['layak', 'tunggak']);
            $table->timestamps();
        });
        Schema::create('jenjang_kelas', function (Blueprint $table) {
            $table->char('kode_jenjang', 2)->primary();
            $table->char('jenjang_angka', 2);
            $table->string('jenjang_nama', 20);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE jenjang_kelas ADD CONSTRAINT cek_kode_jenjang CHECK ((kode_jenjang > 0) AND (kode_jenjang < 13))');
        DB::statement('ALTER TABLE jenjang_kelas ADD CONSTRAINT cek_jenjang CHECK ((jenjang_angka > 0) AND (jenjang_angka < 13))');
        Schema::create('kelas', function (Blueprint $table){
            $table->char('kode_kelas', 8)->primary();
            $table->char('kode_jenjang', 2);
            $table->string('nama_kelas', 30);
            $table->timestamps();
            $table->foreign('kode_jenjang')->references('kode_jenjang')->on('jenjang_kelas');
        });
        Schema::create('siswa_kelas', function (Blueprint $table){
            $table->char('nisn', 10);
            $table->string('kode_kelas', 8);
            $table->enum('status', ['berlangsung', 'lulus']);
            $table->timestamps();
            $table->primary(['nisn', 'kode_kelas']);
            $table->foreign('nisn')->references('nisn')->on('siswa');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('jenjang_kelas');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('siswa_kelas');
    }
}
