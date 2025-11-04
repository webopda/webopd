<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inovasi extends Model
{
    use HasFactory;
    protected $table = 'inovasi';
    protected $fillable = [
        'judul', 'tahun', 'deskripsi', 'sop', 'manual_book', 'img1', 'img2', 'tgl_publish', 'proposal'
    ];
}
