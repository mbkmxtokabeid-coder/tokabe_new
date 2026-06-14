<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasiooh extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        // 'nama' => 'array',
        // 'deskripsi_lokasi' => 'array',
    ];
}