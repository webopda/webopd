<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;
    protected $table = 'submenu';
    protected $fillable = [
        'navbar_id', 'submenu', 'url', 'slug', 'is_dynamic', 'urutan'
    ];

    public function navbar()
    {
        return $this->belongsTo(Navbar::class, 'navbar_id', 'id');
    }

    public function KontenNavbar()
    {
        return $this->hasMany(KontenNavbar::class, 'submenu_id', 'id');
    }
}
