<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Alter kolom nama agar cukup menampung JSON bilingual
DB::statement('ALTER TABLE lokasioohs MODIFY nama TEXT');
echo "ALTER nama -> TEXT: OK\n";

DB::statement('ALTER TABLE lokasioohs MODIFY deskripsi_lokasi TEXT');
echo "ALTER deskripsi_lokasi -> TEXT: OK\n";
