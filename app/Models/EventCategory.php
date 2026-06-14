<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'nama_kategori'];

    /**
     * Relasi: kategori ini milik satu event
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
