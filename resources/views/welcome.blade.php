<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Tokabe.id - Advertising Agency Solutions in Medan, Sumatera') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/jpeg" href="{{ asset('images/LogoTKB.jpg') }}?v=2">
    <link rel="shortcut icon" type="image/jpeg" href="{{ asset('images/LogoTKB.jpg') }}?v=2">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white antialiased text-gray-900">

    <x-navbar />

    <main>
        <x-home.hero :heroes="$heroes" />

        <x-home.services :services="$services" />


        <x-home.map />

        <x-home.dooh-sites :lokasi="$lokasi" />

        <x-home.ooh-sites :lokasiooh="$lokasiooh" />

        <x-home.cta />

        <x-home.partners :partners="$partners" />
    </main>

    <x-footer />

</body>
</html>