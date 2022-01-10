<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    public $incrementing = false;
    protected $primaryKey = 'kode_kelas';
    protected $keyType = 'char';

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_kelas')->withPivot('status');
    }
    public function jenjangKelas()
    {
        return $this->belongsTo(JenjangKelas::class);
    }
}
