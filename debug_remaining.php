<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Ambil raw data untuk 27 ID yang masih belum diterjemahkan
$ids = [79, 187, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 239, 240, 243, 245, 248, 288];
$rows = DB::table('lokasioohs')->whereIn('id', $ids)->orderBy('id')->get(['id', 'deskripsi_lokasi', 'wilayah']);

foreach ($rows as $r) {
    $raw = $r->deskripsi_lokasi;
    echo "=== ID {$r->id} [{$r->wilayah}] ===\n";
    echo "RAW: " . bin2hex(substr($raw, 0, 50)) . "\n";
    if (str_starts_with(trim($raw), '{')) {
        $arr = json_decode($raw, true);
        echo "EN: [" . substr($arr['en'] ?? '', 0, 100) . "]\n";
        echo "ID: [" . substr($arr['id'] ?? '', 0, 100) . "]\n";
    } else {
        echo "NOT JSON: " . substr($raw, 0, 100) . "\n";
    }
    echo "\n";
}
