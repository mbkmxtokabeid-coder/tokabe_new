<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioImage extends Model
{
    use HasFactory;

    protected $table = 'portofolio_images'; // pastikan ini sama dengan nama tabel kamu

    protected $fillable = [
        'portofolio_id',
        'image'
    ];

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }
}
