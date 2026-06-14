<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'lokasi',
        'waktu',
        'gambar',
        'koordinat',
        'kode_event',
    ];

    // Relasi: satu event punya banyak kategori
    public function categories()
    {
        return $this->hasMany(\App\Models\EventCategory::class, 'event_id');
    }
}
