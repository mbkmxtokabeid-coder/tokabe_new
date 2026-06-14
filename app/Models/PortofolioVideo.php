<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioVideo extends Model
{
    use HasFactory;

    protected $table = 'portofolio_videos'; // pastikan ini sama dengan nama tabel kamu

    protected $fillable = [
        'portofolio_id',
        'video_path' // Sesuaikan jika nama kolom di database kamu berbeda (misal: 'video_path')
    ];

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }
}