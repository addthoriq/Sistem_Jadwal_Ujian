<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajaran';
    public $incrementing = false;
    protected $primaryKey = 'kode_mapel';
    protected $keyType = 'char';

    protected $guarded = [];

    public function jenjangKelas()
    {
        return $this->belongsTo(JenjangKelas::class);
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}
