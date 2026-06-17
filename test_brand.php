<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';
$app = app();
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$brands = App\Models\Brand::all();
foreach ($brands as $b) {
    echo "ID: {$b->id}\n";
    var_dump($b->getAttributes());
}
