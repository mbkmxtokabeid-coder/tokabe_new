<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$total = DB::table('lokasioohs')->count();
$noImg = DB::table('lokasioohs')->whereNull('gambar')->orWhere('gambar','')->count();
$withImg = DB::table('lokasioohs')->whereNotNull('gambar')->where('gambar','!=','')->count();

echo "Total: $total\n";
echo "Punya gambar: $withImg\n";
echo "Tanpa gambar: $noImg\n\n";

// Cek file yang ada di DB tapi tidak ada di storage
echo "=== CEK FILE RUSAK (ada di DB, tidak ada di storage) ===\n";
$rows = DB::table('lokasioohs')->whereNotNull('gambar')->where('gambar','!=','')->get(['id','gambar']);
$missing = 0;
$ok = 0;
foreach ($rows as $r) {
    $path = public_path('storage/image_lokasiooh/' . $r->gambar);
    if (!file_exists($path)) {
        echo "MISSING ID {$r->id}: {$r->gambar}\n";
        $missing++;
    } else {
        $ok++;
    }
}
echo "\nFile OK: $ok | File MISSING: $missing\n";

// Juga cek apakah ada gambar yang path-nya pakai folder lain
echo "\n=== SAMPLE GAMBAR FIELD (10 pertama) ===\n";
$sample = DB::table('lokasioohs')->whereNotNull('gambar')->where('gambar','!=','')->limit(10)->get(['id','gambar']);
foreach ($sample as $s) {
    echo "ID {$s->id}: {$s->gambar}\n";
}
