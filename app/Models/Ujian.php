<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;

class Ujian extends Model
{
    use HasFactory;
    use CompositeKey;
    protected $table = 'ujian';
    public $incrementing = false;
    protected $primaryKey = ['kode_ujian', 'kode_mapel', 'kode_kalender', 'kode_kategori'];
    protected $keyType = 'char';

    protected $guarded = [];

    public function kategoriUjian()
    {
        return $this->belongsTo(KategoriUjian::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function kalenderAkademik()
    {
        return $this->belongsTo(KalenderAkademik::class);
    }
}
