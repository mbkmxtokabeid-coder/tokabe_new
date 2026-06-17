<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$rows = DB::table('lokasioohs')->orderBy('id')->get();

foreach ($rows as $r) {
    $namaRaw = $r->nama ?? '';
    $deskRaw = $r->deskripsi_lokasi ?? '';

    $namaArr = str_starts_with(trim($namaRaw), '{') ? json_decode($namaRaw, true) : null;
    $deskArr = str_starts_with(trim($deskRaw), '{') ? json_decode($deskRaw, true) : null;

    $namaId = $namaArr ? ($namaArr['id'] ?? $namaArr['en'] ?? $namaRaw) : $namaRaw;
    $namaEn = $namaArr ? ($namaArr['en'] ?? $namaArr['id'] ?? $namaRaw) : $namaRaw;
    $deskId = $deskArr ? ($deskArr['id'] ?? $deskArr['en'] ?? $deskRaw) : $deskRaw;
    $deskEn = $deskArr ? ($deskArr['en'] ?? $deskArr['id'] ?? $deskRaw) : $deskRaw;

    $isNamaBilingual = $namaArr && isset($namaArr['id']) && isset($namaArr['en']);
    $isDeskBilingual = $deskArr && isset($deskArr['id']) && isset($deskArr['en']);

    echo "=== ID: {$r->id} | {$r->wilayah} | {$r->provinsi} ===\n";
    echo "NAMA_EN : {$namaEn}\n";
    echo "NAMA_ID : {$namaId}\n";
    echo "NAMA OK : " . ($isNamaBilingual ? 'YES' : 'NO - NEEDS TRANSLATION') . "\n";
    echo "DESK_EN : {$deskEn}\n";
    echo "DESK_ID : {$deskId}\n";
    echo "DESK OK : " . ($isDeskBilingual ? 'YES' : 'NO - NEEDS TRANSLATION') . "\n";
    echo "\n";
}

echo "Total: " . count($rows) . " billboard\n";
