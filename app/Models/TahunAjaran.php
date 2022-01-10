<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;

class TahunAjaran extends Model
{
    use HasFactory;
    use CompositeKey;

    protected $table = 'tahun_ajaran';
    public $incrementing = false;
    protected $primaryKey = ['kode_ta', 'tahun_awal', 'tahun_akhir'];
    protected $keyType = 'char';

    protected $guarded = [];

    public function kalenderAkademik()
    {
        return $this->hasMany(KalenderAkademik::class);
    }
}
