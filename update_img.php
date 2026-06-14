<?php
$l1 = \App\Models\Lokasiooh::find(1);
if ($l1) {
    $l1->gambar = 'https://images.unsplash.com/photo-1506146332389-18140dc7b2fb?q=80&w=800&auto=format&fit=crop';
    $l1->save();
}

$l2 = \App\Models\Lokasiooh::find(2);
if ($l2) {
    $l2->gambar = 'https://images.unsplash.com/photo-1542204165-65bf26472b9b?q=80&w=800&auto=format&fit=crop';
    $l2->save();
}
echo "Done";
