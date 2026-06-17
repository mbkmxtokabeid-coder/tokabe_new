<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Decode a raw DB field that may be a JSON string, a plain string, or already an array.
     * Returns the best single-language string OR an array (for callers that need $field[locale]).
     */
    private function decodeField(string $field): mixed
    {
        $raw = $this->getRawOriginal($field);
        if ($raw === null || $raw === '') return null;
        if (is_array($raw)) return $raw;
        $decoded = json_decode($raw, true);
        return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $raw;
    }

    public function getJudulAttribute(): mixed      { return $this->decodeField('judul'); }
    public function getTabTitleAttribute(): mixed   { return $this->decodeField('tab_title'); }
    public function getDeskripsiAttribute(): mixed  { return $this->decodeField('deskripsi'); }
    public function getDetailAttribute(): mixed
    {
        $raw = $this->getRawOriginal('detail');
        if (!$raw) return [];
        $decoded = json_decode($raw, true);
        return (json_last_error() === JSON_ERROR_NONE) ? $decoded : [];
    }
}
