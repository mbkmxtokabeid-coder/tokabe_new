<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Show columns
$cols = DB::select('DESCRIBE lokasioohs');
echo "=== COLUMNS ===\n";
foreach ($cols as $c) {
    echo $c->Field . " | " . $c->Type . "\n";
}

echo "\n=== SAMPLE DATA (first 3) ===\n";
$rows = DB::table('lokasioohs')->orderBy('id')->limit(3)->get();
foreach ($rows as $r) {
    echo json_encode((array)$r, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n\n";
}
