<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenjangKelas extends Model
{
    use HasFactory;
    protected $table = 'jenjang_kelas';
    public $incrementing = false;
    protected $primaryKey = 'kode_jenjang';
    protected $keyType = 'char';

    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function matePelajaran()
    {
        return $this->hasMany(MataPelajaran::class);
    }
}
