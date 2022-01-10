<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
    use HasFactory;
    protected $table = 'kalender_akademik';
    public $incrementing = false;
    protected $primaryKey = 'kode_kalender';
    protected $keyType = 'char';

    protected $guarded = [];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}
