<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;
    protected $table = 'rawat_inap';
    protected $fillable = [
        'nama', 'keterangan', 'icon'
    ];

    public function DetailInap()
    {
        return $this->hasMany(DetailInap::class, 'inap_id', 'id');
    }
    

}
