<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    use HasFactory;
    protected $table = 'photography';
    protected $fillable = ['title', 'description', 'image_url'];

    private function decodeField(string $field): mixed
    {
        $raw = $this->getRawOriginal($field);
        if ($raw === null || $raw === '') return null;
        if (is_array($raw)) return $raw;
        $decoded = json_decode($raw, true);
        return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $raw;
    }

    public function getTitleAttribute(): mixed       { return $this->decodeField('title'); }
    public function getDescriptionAttribute(): mixed { return $this->decodeField('description'); }
}

