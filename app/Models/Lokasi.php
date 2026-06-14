<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        // 'nama' => 'array',
        // 'deskripsi_lokasi' => 'array',
    ];
    public function getFormattedGambarAttribute()
    {
       
        if (str_contains($this->gambar, 'image_lokasi/')) {
            return $this->gambar;
        }

        
        return 'image_lokasi/' . $this->gambar;
    }
}
