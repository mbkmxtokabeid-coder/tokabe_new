<?php
// Empty the table first
\App\Models\Lokasi::truncate();

\App\Models\Lokasi::create([
    'nama' => 'Putri Hijau Street, next to GMP Building HM. Yamin & in front of GMP Building',
    'deskripsi_lokasi' => 'The ONE and ONLY in Medan two screens Videotron, connecting vertical and horizontal motion also HIGHLIGHTS the SYNCHRONIZED MOTION.',
    'wilayah' => 'Medan',
    'koordinat' => '3.5952,98.6722',
    'media' => 'Videotron',
    'size' => 'Multiple Screens',
    'type' => 'Vertical & Horizontal',
    'motor' => '150,000',
    'mobil' => '200,000',
    'lighting' => 'LED',
    // I will use an Unsplash image for now or use the old image name if it exists? Let's use the one from dummy.
    'gambar' => null, 
]);

\App\Models\Lokasi::create([
    'nama' => 'View From Jl. Gatot Subroto (Bundaran SIB) Medan',
    'deskripsi_lokasi' => 'An ICONIC CURVE LED on Medan SIB Tower! Display for DOOH Advertising, visually on the STRIKING CURVE LED SCREEN on or around prominent clock tower.',
    'wilayah' => 'Medan',
    'koordinat' => '3.5902,98.6602',
    'media' => 'Curve Videotron',
    'size' => 'Custom Curve',
    'type' => 'Horizontal',
    'motor' => '120,000',
    'mobil' => '180,000',
    'lighting' => 'LED',
    'gambar' => null,
]);

echo "Done populating DOOH.";
