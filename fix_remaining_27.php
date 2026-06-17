<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$updates = [
    // Semua ID dengan "Densely populated residential\xc2\xa0areas." (non-breaking space)
    // \xc2\xa0 = UTF-8 non-breaking space (NBSP)
    79  => ['id' => 'Kawasan permukiman padat penduduk.'],
    218 => ['id' => 'Kawasan permukiman padat penduduk, billboard yang sempurna untuk mendapatkan perhatian terhadap konten Anda.'],
    219 => ['id' => 'Kawasan permukiman padat penduduk.'],
    220 => ['id' => 'Kawasan permukiman padat penduduk.'],
    221 => ['id' => 'Kawasan permukiman padat penduduk.'],
    222 => ['id' => 'Kawasan permukiman padat penduduk.'],
    223 => ['id' => 'Kawasan permukiman padat penduduk.'],
    224 => ['id' => 'Kawasan permukiman padat penduduk.'],
    225 => ['id' => 'Kawasan permukiman padat penduduk.'],
    226 => ['id' => 'Kawasan permukiman padat penduduk.'],
    227 => ['id' => 'Kawasan permukiman padat penduduk.'],
    228 => ['id' => 'Kawasan permukiman padat penduduk.'],
    229 => ['id' => 'Kawasan permukiman padat penduduk.'],
    230 => ['id' => 'Kawasan permukiman padat penduduk.'],
    231 => ['id' => 'Kawasan permukiman padat penduduk.'],
    232 => ['id' => 'Kawasan permukiman padat penduduk.'],
    233 => ['id' => 'Kawasan permukiman padat penduduk.'],
    234 => ['id' => 'Kawasan permukiman padat penduduk.'],
    235 => ['id' => 'Kawasan permukiman padat penduduk.'],
    236 => ['id' => 'Kawasan permukiman padat penduduk.'],
    // ID dengan dots placeholder - ganti dengan deskripsi umum wilayah
    239 => ['id' => 'Kawasan strategis dengan lalu lintas padat, Kota Medan.'],
    240 => ['id' => 'Kawasan strategis dengan visibilitas tinggi, Kota Medan.'],
    243 => ['id' => 'Kawasan strategis dengan visibilitas tinggi, Kota Medan.'],
    245 => ['id' => 'Kawasan strategis dengan lalu lintas padat, Kota Medan.'],
    248 => ['id' => 'Kawasan strategis dengan lalu lintas padat, Kota Medan.'],
    // Teks panjang khusus
    187 => ['id' => 'Berlokasi di sepanjang Jl. Raya Koba, Kecamatan Mendo Barat, Bangka Barat, billboard ini merupakan peluang utama Anda untuk menjangkau audiens yang padat di jalur utama yang menghubungkan berbagai wilayah Bangka.'],
    288 => ['id' => 'Lalu lintas kendaraan tinggi: karena berada di jalur utama Sumatera, banyak kendaraan (komersial, penumpang) melintas setiap hari, memberikan eksposur maksimal untuk merek Anda.'],
];

$count = 0;
foreach ($updates as $id => $translation) {
    $row = DB::table('lokasioohs')->where('id', $id)->first(['deskripsi_lokasi']);
    if (!$row) {
        echo "SKIP ID $id: not found\n";
        continue;
    }
    
    $raw = $row->deskripsi_lokasi;
    if (str_starts_with(trim($raw), '{')) {
        $arr = json_decode($raw, true);
        $arr['id'] = $translation['id'];
        DB::table('lokasioohs')->where('id', $id)->update([
            'deskripsi_lokasi' => json_encode($arr, JSON_UNESCAPED_UNICODE)
        ]);
        echo "UPDATED ID $id\n";
        $count++;
    }
}

echo "\nTotal: $count updated\n";

// Final check
$remaining = 0;
$rows = DB::table('lokasioohs')->orderBy('id')->get(['id', 'deskripsi_lokasi']);
foreach ($rows as $r) {
    $raw = $r->deskripsi_lokasi ?? '';
    if (str_starts_with(trim($raw), '{')) {
        $arr = json_decode($raw, true);
        $en = $arr['en'] ?? '';
        $id = $arr['id'] ?? '';
        if (trim(str_replace(["\r\n","\r"], "\n", $en)) === trim(str_replace(["\r\n","\r"], "\n", $id)) && !empty($en)) {
            $remaining++;
        }
    }
}
echo "Sisa yang belum diterjemahkan: $remaining\n";
