<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'kode_permission';
    protected $keyType = 'char';

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
}
