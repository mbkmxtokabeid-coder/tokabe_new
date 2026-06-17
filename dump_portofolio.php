<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$portfolios = App\Models\Portofolio::with('category')->orderBy('id')->get();

foreach ($portfolios as $p) {
    $judul = $p->judul;
    $deskripsi = $p->deskripsi;

    // Decode if JSON
    $judulArr = null;
    $deskripsiArr = null;
    if (str_starts_with(trim($judul ?? ''), '{')) {
        $judulArr = json_decode($judul, true);
    }
    if (str_starts_with(trim($deskripsi ?? ''), '{')) {
        $deskripsiArr = json_decode($deskripsi, true);
    }

    $kategori = $p->category;
    $katName = '';
    if ($kategori) {
        $katRaw = $kategori->nama_kategori;
        if (str_starts_with(trim($katRaw ?? ''), '{')) {
            $katArr = json_decode($katRaw, true);
            $katName = $katArr['id'] ?? $katRaw;
        } else {
            $katName = $katRaw;
        }
    }

    echo "=== ID: {$p->id} ===\n";
    echo "KATEGORI: {$katName}\n";
    echo "JUDUL (id): " . ($judulArr ? ($judulArr['id'] ?? '-') : $judul) . "\n";
    echo "DESKRIPSI (id): " . ($deskripsiArr ? ($deskripsiArr['id'] ?? '-') : $deskripsi) . "\n";
    echo "\n";
}
