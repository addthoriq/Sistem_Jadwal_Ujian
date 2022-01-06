<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKalenderAkademikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_ajaran', function (Blueprint $table) {
            $table->char('kode_ta', 9);
            $table->char('tahun_awal', 4);
            $table->char('tahun_akhir', 4);
            $table->char('semester', 1);
            $table->enum('status', ['berlangsung', 'selesai']);
            $table->timestamps();
            $table->primary(['kode_ta', 'tahun_awal', 'tahun_akhir']);
        });
        Schema::create('kalender_akademik', function (Blueprint $table) {
            $table->char('kode_kalender', 8)->primary(); // 21221001
            $table->char('kode_ta', 9);
            $table->string('nama_kegiatan', 50);
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->timestamps();
            $table->foreign('kode_ta')->references('kode_ta')->on('tahun_ajaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tahun_ajaran');
        Schema::dropIfExists('kalender_akademik');
    }
}
