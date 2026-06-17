<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Cek yang field 'id' dalam JSON sama dengan field 'en' (belum diterjemahkan)
$rows = DB::table('lokasioohs')->orderBy('id')->get(['id', 'nama', 'deskripsi_lokasi', 'wilayah']);
$sameid = [];
foreach ($rows as $r) {
    $deskRaw = $r->deskripsi_lokasi ?? '';
    $namaRaw = $r->nama ?? '';
    
    if (str_starts_with(trim($deskRaw), '{')) {
        $deskArr = json_decode($deskRaw, true);
        $deskEn = $deskArr['en'] ?? '';
        $deskId = $deskArr['id'] ?? '';
        
        // Cek apakah 'id' sama dengan 'en' (belum diterjemahkan)
        if (trim($deskId) === trim($deskEn) && !empty($deskEn)) {
            $sameid[] = $r->id;
            echo "ID {$r->id} [{$r->wilayah}] - DESK NOT TRANSLATED:\n";
            echo "  EN: " . substr($deskEn, 0, 100) . "\n\n";
        }
    }
    
    if (str_starts_with(trim($namaRaw), '{')) {
        $namaArr = json_decode($namaRaw, true);
        $namaEn = $namaArr['en'] ?? '';
        $namaId = $namaArr['id'] ?? '';
        
        // Nama yang id-nya masih mengandung kata English khas yang belum diterjemah
        if (str_contains($namaId, ' Street, Medan City, North Sumatra Province') ||
            str_contains($namaId, 'at the intersection with') ||
            str_contains($namaId, 'in front of') ||
            str_contains($namaId, 'Regency, North Sumatra Province')) {
            echo "ID {$r->id} [{$r->wilayah}] - NAMA NEEDS BETTER TRANSLATION:\n";
            echo "  EN: " . substr($namaEn, 0, 100) . "\n";
            echo "  ID: " . substr($namaId, 0, 100) . "\n\n";
        }
    }
}
echo "Total DESK belum diterjemah: " . count($sameid) . "\n";
echo "IDs: " . implode(', ', $sameid) . "\n";
