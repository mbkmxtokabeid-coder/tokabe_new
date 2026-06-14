$targetBase = "C:\Users\user\Downloads\storage\app\public"
$linkBase = "C:\Users\user\Tokabenew\storage\app\public"

$folders = @(
    "image_brand",
    "image_brand_details",
    "image_hero",
    "image_lokasi",
    "image_lokasiooh",
    "image_partner",
    "image_photography",
    "image_service",
    "image_video",
    "kategori",
    "portofolio"
)

foreach ($folder in $folders) {
    $linkPath = Join-Path $linkBase $folder
    if (Test-Path $linkPath) {
        if ((Get-Item $linkPath).LinkType -ne 'Junction') {
            Rename-Item -Path $linkPath -NewName "$folder.bak" -ErrorAction SilentlyContinue
        } else {
            Remove-Item -Path $linkPath -Force -Recurse -ErrorAction SilentlyContinue
        }
    }
    
    $targetPath = Join-Path $targetBase $folder
    if (Test-Path $targetPath) {
        New-Item -ItemType Junction -Path $linkPath -Target $targetPath | Out-Null
        Write-Host "Created junction for $folder"
    } else {
        Write-Host "Target $targetPath does not exist"
    }
}

$imagePortofolioPath = Join-Path $linkBase "image_portofolio"
if (Test-Path $imagePortofolioPath) {
    if ((Get-Item $imagePortofolioPath).LinkType -ne 'Junction') {
        Rename-Item -Path $imagePortofolioPath -NewName "image_portofolio.bak" -ErrorAction SilentlyContinue
    } else {
        Remove-Item -Path $imagePortofolioPath -Force -Recurse -ErrorAction SilentlyContinue
    }
}
$targetPortofolioPath = Join-Path $targetBase "portofolio"
if (Test-Path $targetPortofolioPath) {
    New-Item -ItemType Junction -Path $imagePortofolioPath -Target $targetPortofolioPath | Out-Null
    Write-Host "Created junction for image_portofolio -> portofolio"
}

Write-Host "Done creating junctions."
