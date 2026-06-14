<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'event_category_id',
        'nik',
        'fullname',
        'email',
        'phone',
        'address',
        'tiket',
        'event_name',
        'event_date',
        'registration_number',
        'checked_in',
        'user_id', 
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($participant) {
            $ticketPath = storage_path('app/public/ticket-' . $participant->id . '.pdf');
            $qrPath = storage_path('app/public/qrcodes/qr-' . $participant->id . '.png');

            if (file_exists($ticketPath)) {
                unlink($ticketPath);
            }

            if (file_exists($qrPath)) {
                unlink($qrPath);
            }
        });
    }

    // 🔗 Relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // 🔗 Relasi ke EventCategory
    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }
}
