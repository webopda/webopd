<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    use HasFactory;
    protected $table = 'navbar';
    protected $fillable = [
        'menu', 'url', 'is_dynamic', 'urutan'
    ];

    public function submenus()
    {
        return $this->hasMany(Submenu::class, 'navbar_id', 'id')
                    ->orderBy('urutan');
    }
}
