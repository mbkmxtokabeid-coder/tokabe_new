<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Tokabe.id - Advertising Agency Solutions in Medan, Sumatera') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white antialiased text-gray-900">

    <x-navbar />

    @php
        // Data Dummy Services
        $dummyServices = [
            (object)['id' => 1, 'judul' => 'Premium Strategic Location DOOH', 'title_id' => 'DOOH Lokasi Strategis Premium', 'formattedService' => 'SUPER and ICONIC LOCATION Advertising LED video displays in MEDAN.', 'ikon' => 'fas fa-tv'],
            (object)['id' => 2, 'judul' => 'Videography & Photography', 'title_id' => 'Videografi & Fotografi', 'formattedService' => 'Membuat video profile perusahaan, dokumentasi event, hingga promosi kreatif.', 'ikon' => 'fas fa-camera']
        ];

        // Data Dummy OOH Sites
        $dummyOOH = [
            (object)['id' => 1, 'gambar' => 'https://images.unsplash.com/photo-1542204625-274640523455?q=80&w=600&auto=format&fit=crop', 'wilayah' => 'Medan', 'nama' => 'Billboard Jl. Sudirman', 'formattedLokasiooh' => 'Lokasi strategis di pusat kota.'],
            (object)['id' => 2, 'gambar' => 'https://images.unsplash.com/photo-1580130732560-ce8084a51163?q=80&w=600&auto=format&fit=crop', 'wilayah' => 'Pekanbaru', 'nama' => 'Videotron Mall SKA', 'formattedLokasiooh' => 'Titik premium di area komersial.'],
            (object)['id' => 3, 'gambar' => 'https://images.unsplash.com/photo-1558231221-4d3de5f9cbbf?q=80&w=600&auto=format&fit=crop', 'wilayah' => 'Batam', 'nama' => 'Baliho Simpang Kabil', 'formattedLokasiooh' => 'Visibilitas 24 jam menuju bandara.']
        ];

        // Data Dummy Logo Partners
        $dummyPartners = [
            (object)['nama' => 'Google', 'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg'],
            (object)['nama' => 'Apple', 'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'],
            (object)['nama' => 'Microsoft', 'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg'],
            (object)['nama' => 'Amazon', 'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'],
            (object)['nama' => 'Facebook', 'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg'],
            (object)['nama' => 'Tesla', 'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Tesla_Motors_logo.svg']
        ];
    @endphp

    <main>
        <x-home.hero />

        <x-home.services :services="$dummyServices" />

        <x-home.map />

        <x-home.ooh-sites :lokasiooh="$dummyOOH" />

        <x-home.partners :partners="$dummyPartners" />
    </main>

    </body>
</html>