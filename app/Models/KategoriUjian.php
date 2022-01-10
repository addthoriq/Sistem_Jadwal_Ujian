<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUjian extends Model
{
    use HasFactory;
    protected $table = 'kategori_ujian';
    public $incrementing = false;
    protected $primaryKey = 'kode_kategori';
    protected $keyType = 'char';

    protected $guarded = [];

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}
