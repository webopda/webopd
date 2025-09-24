<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable = [
        'nama', 'poli_id', 'jk', 'jabatan', 'detail_jabatan', 'img_jadwal'
    ];

    public function Poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
	}

    public function RawatJalan()
    {
        return $this->hasMany(RawatJalan::class, 'dokter_id', 'id');
    }
}
