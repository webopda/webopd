<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenNavbar extends Model
{
    use HasFactory;
    protected $table = 'konten_navbar';
    protected $fillable = [
        'submenu_id', 'judul', 'konten', 'img'
    ];

    public function Submenu()
    {
        return $this->belongsTo(Submenu::class, 'submenu_id');
	}
}
