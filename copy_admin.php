<?php
$sourceDir = 'C:\Users\user\tokabe\app\Http\Controllers';
$adminSourceDir = 'C:\Users\user\tokabe\app\Http\Controllers\Admin';
$destDir = 'C:\Users\user\Tokabenew\app\Http\Controllers\Admin';

if (!is_dir($destDir)) {
    mkdir($destDir, 0777, true);
}

$controllersToCopy = [
    'BrandController.php',
    'DashboardController.php',
    'HeroController.php',
    'KeunggulanController.php',
    'LokasiController.php',
    'LokasioohController.php',
    'PartnerController.php',
    'PesanController.php',
    'PhotographyController.php',
    'ServiceController.php',
    'VideoController.php',
];

foreach ($controllersToCopy as $file) {
    if (file_exists("$sourceDir\\$file")) {
        $content = file_get_contents("$sourceDir\\$file");
        // Change namespace
        $content = str_replace('namespace App\Http\Controllers;', "namespace App\Http\Controllers\Admin;\n\nuse App\Http\Controllers\Controller;", $content);
        file_put_contents("$destDir\\$file", $content);
    }
}

// Copy Admin ones
$adminControllersToCopy = [
    'EventCategoryController.php',
    'EventController.php',
    'ParticipantController.php',
    'PortofolioCategoryController.php',
    'PortofolioController.php'
];

foreach ($adminControllersToCopy as $file) {
    if (file_exists("$adminSourceDir\\$file")) {
        $content = file_get_contents("$adminSourceDir\\$file");
        file_put_contents("$destDir\\$file", $content);
    }
}

// Also we need to copy resources/views/admin
$viewsSource = 'C:\Users\user\tokabe\resources\views\admin';
$viewsDest = 'C:\Users\user\Tokabenew\resources\views\admin';
shell_exec("xcopy \"$viewsSource\" \"$viewsDest\" /E /I /Y");

echo "Done.";
