<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'ikon', 'sort_order', 'status', 'gambar'
    ];

    protected $casts = [
        'judul' => 'array',
        'deskripsi' => 'array',
    ];
}