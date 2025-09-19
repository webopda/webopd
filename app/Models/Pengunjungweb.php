<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjungweb extends Model
{
    use HasFactory;
    protected $fillable=[
          'pengunjung',
           'tanggal',
    ];
}
