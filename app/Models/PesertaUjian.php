<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;

class PesertaUjian extends Model
{
    use HasFactory;
    use CompositeKey;

    protected $table = 'peserta_ujian';
    public $incrementing = false;
    protected $primaryKey = ['nisn', 'kode_kelas', 'kode_ujian'];
    protected $keyType = 'char';

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
