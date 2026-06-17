<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Fix ID 60, 61, 62 - file PNG lama tidak ada, set ke empty string
$missing = [60, 61, 62];
foreach ($missing as $id) {
    DB::table('lokasioohs')->where('id', $id)->update(['gambar' => '']);
    echo "Fixed ID $id: gambar set to ''\n";
}

// Cek semua yang belum bilingual
echo "\n=== CEK YANG BELUM BILINGUAL ===\n";
$rows = DB::table('lokasioohs')->orderBy('id')->get(['id', 'nama', 'deskripsi_lokasi', 'wilayah']);
$notBilingual = [];
foreach ($rows as $r) {
    $deskRaw = $r->deskripsi_lokasi ?? '';
    $namaRaw = $r->nama ?? '';
    $isDeskJson = str_starts_with(trim($deskRaw), '{');
    $isNamaJson = str_starts_with(trim($namaRaw), '{');
    if (!$isDeskJson || !$isNamaJson) {
        $notBilingual[] = $r;
        echo "ID {$r->id} [{$r->wilayah}] nama_ok=" . ($isNamaJson ? 'Y':'N') . " desk_ok=" . ($isDeskJson ? 'Y':'N') . "\n";
        echo "  EN_NAMA: " . substr($namaRaw, 0, 100) . "\n";
        echo "  EN_DESK: " . substr($deskRaw, 0, 100) . "\n\n";
    }
}
echo "Total belum bilingual: " . count($notBilingual) . "\n";
