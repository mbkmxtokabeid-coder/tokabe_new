<?php
$l1 = \App\Models\Lokasiooh::find(1);
if ($l1) {
    $l1->nama = 'Jl. Gatot Subroto (Simpang Majestik)';
    $l1->deskripsi_lokasi = 'Premium traditional outdoor advertising placed in highly strategic intersections across the city.';
    $l1->wilayah = 'Medan';
    $l1->koordinat = '3.5852,98.6652';
    $l1->media = 'Videotron';
    $l1->size = '4m x 8m';
    $l1->type = 'Vertical';
    $l1->motor = '75,000';
    $l1->mobil = '100,000';
    $l1->lighting = 'LED';
    $l1->save();
}

$l2 = \App\Models\Lokasiooh::find(2);
if ($l2) {
    $l2->nama = 'Jl. Jend. Sudirman (Kawasan CBD)';
    $l2->deskripsi_lokasi = 'An ICONIC CURVE LED on Medan SIB Tower! Display for DOOH Advertising, visually on the STRIKING CURVE LED SCREEN on or around prominent clock tower.';
    $l2->wilayah = 'Medan';
    $l2->koordinat = '3.5802,98.6702';
    $l2->media = 'Billboard';
    $l2->size = '5m x 10m';
    $l2->type = 'Horizontal';
    $l2->motor = '85,000';
    $l2->mobil = '120,000';
    $l2->lighting = 'Frontlite';
    $l2->save();
}
echo "Done";
