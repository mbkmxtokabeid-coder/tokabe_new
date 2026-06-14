<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ is_array($service->judul) ? ($service->judul[app()->getLocale()] ?? $service->judul['id'] ?? $service->judul['en'] ?? '') : $service->judul }} - Tokabe.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased text-gray-900 font-sans">
    <x-navbar theme="dark" />
    <main>
        <div class="relative min-h-screen bg-gray-50 pt-32 pb-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Title -->
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-12 text-center md:text-left">
                    {{ is_array($service->judul) ? ($service->judul[app()->getLocale()] ?? $service->judul['id'] ?? $service->judul['en'] ?? '') : $service->judul }}
                </h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center bg-white p-8 md:p-12 rounded-3xl shadow-xl">
                    <!-- Gambar Kiri -->
                    <div class="flex justify-center h-full order-1 md:order-1">
                        <div class="rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transition-shadow duration-300 w-full h-full min-h-[300px]">
                            @php
                                $imageUrl = $service->gambar ? asset('storage/image_service/' . $service->gambar) : 'https://images.unsplash.com/photo-1542204165-65bf26472b9b?q=80&w=600&auto=format&fit=crop';
                                $waTitle = is_array($service->judul) ? ($service->judul[app()->getLocale()] ?? $service->judul['id'] ?? '') : $service->judul;
                            @endphp
                            <img src="{{ $imageUrl }}" 
                                 alt="{{ $waTitle }}" 
                                 class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500 min-h-[400px]">
                        </div>
                    </div>

                    <!-- Konten Kanan -->
                    <div class="order-2 md:order-2">
                        <div class="prose prose-lg text-gray-600 mb-10 leading-relaxed">
                            {!! is_array($service->deskripsi) ? ($service->deskripsi[app()->getLocale()] ?? $service->deskripsi['id'] ?? $service->deskripsi['en'] ?? '') : $service->deskripsi !!}
                        </div>
                        
                        <div class="flex flex-col gap-4 mt-8">
                            <a href="{{ $discoverLink ?? route('home') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-lg text-white bg-green-600 hover:bg-green-700 hover:-translate-y-1 transform transition-all duration-300 w-full md:w-max">
                                {{ __('Discover More') }} <i class="fas fa-arrow-right ml-3"></i>
                            </a>
                            
                            @php
                                $waUrl = "https://api.whatsapp.com/send?phone=628115239999&text=" . urlencode(__('Halo Admin Tokabe, saya mau menanyakan tentang ')) . urlencode($waTitle) . "%20%F0%9F%99%8F";
                            @endphp
                            <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center justify-center px-8 py-4 border-2 border-green-600 text-base font-semibold rounded-full text-green-600 bg-transparent hover:bg-green-50 hover:-translate-y-1 transform transition-all duration-300 w-full md:w-max">
                                <i class="fa-brands fa-whatsapp mr-3 text-xl"></i>
                                {{ __('Call Astronaut : 08115239999') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer />
</body>
</html>
