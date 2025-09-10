<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nama', 'jk', 'jabatan', 'img', 'detail_jabatan'
    ];

    public function Berita()
    {
        return $this->hasMany(Berita::class, 'author', 'id');
    }
}
