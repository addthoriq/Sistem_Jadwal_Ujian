<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    public $incrementing = false;
    protected $primaryKey = 'nisn';
    protected $keyType = 'char';

    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'siswa_kelas')->withPivot('status');
    }


}
