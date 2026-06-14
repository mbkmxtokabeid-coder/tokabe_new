<?php
$s1 = \App\Models\Service::find(1);
if($s1) { $s1->gambar = 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop'; $s1->save(); }

$s2 = \App\Models\Service::find(2);
if($s2) { $s2->gambar = 'https://images.unsplash.com/photo-1542204165-65bf26472b9b?q=80&w=1200&auto=format&fit=crop'; $s2->save(); }

$s3 = \App\Models\Service::find(3);
if($s3) { $s3->gambar = 'https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1200&auto=format&fit=crop'; $s3->save(); }

$s4 = \App\Models\Service::find(4);
if (!$s4) {
    $s4 = new \App\Models\Service();
    $s4->id = 4;
}
$s4->judul = ['en' => 'Event & Brand Activity', 'id' => 'Event & Brand Activity'];
$s4->deskripsi = ['en' => 'Seamless crowd handling, large-scale event guest management, professional invitation delivery, and checking orchestration workflows.', 'id' => 'Seamless crowd handling, large-scale event guest management, professional invitation delivery, and checking orchestration workflows.'];
$s4->ikon = 'fas fa-users';
$s4->gambar = 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=1200&auto=format&fit=crop';
$s4->sort_order = 0;
$s4->status = 1;
$s4->save();

echo "Database updated successfully.\n";
