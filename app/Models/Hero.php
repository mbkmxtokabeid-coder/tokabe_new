<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'gambar', 'status', 'disetujui', 'sort_order'
    ];
}