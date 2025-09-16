<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInap extends Model
{
    use HasFactory;
    protected $table = 'detail_inap';
    protected $fillable = [
        'inap_id', 'img'
    ];

    public function RawatInap()
    {
        return $this->belongsTo(RawatInap::class, 'inap_id');
	}
}
