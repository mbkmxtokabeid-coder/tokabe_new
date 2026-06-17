<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan - Tokabe.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased text-gray-900 font-sans">
    <x-navbar />
    <main>
        <!-- Header Hero Section -->
        <div class="bg-gradient-to-br from-[#042611] via-[#0C5130] to-[#4CAF50] pt-40 pb-24 text-center relative overflow-hidden">
            <!-- Decorative subtle glowing blur circles -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 rounded-full bg-white opacity-5 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-green-300 opacity-10 blur-3xl"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white uppercase tracking-tight mb-4 drop-shadow-md">
                    {!! __('Our Services Header') !!}
                </h1>
                <p class="text-base sm:text-lg lg:text-xl text-green-100 max-w-3xl mx-auto font-light leading-relaxed drop-shadow-sm">
                    {!! strip_tags(__('service_title_html')) !!}
                </p>
            </div>
        </div>

        <!-- Services Grid Section -->
        <div class="bg-white py-16 sm:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @foreach($services as $index => $item)
                @php
                    $judul = is_array($item->judul) ? (($item->judul[app()->getLocale()] ?? '') ?: ($item->judul['id'] ?? '') ?: ($item->judul['en'] ?? '') ?: (collect($item->judul)->first() ?? '')) : $item->judul;
                    $deskripsi = is_array($item->deskripsi) ? (($item->deskripsi[app()->getLocale()] ?? '') ?: ($item->deskripsi['id'] ?? '') ?: ($item->deskripsi['en'] ?? '') ?: (collect($item->deskripsi)->first() ?? '')) : $item->deskripsi;
                    $cleanDesc = strip_tags($deskripsi);
                    $shortDesc = \Illuminate\Support\Str::limit($cleanDesc, 120, '...');
                @endphp
                <a href="{{ route('services.show', $item->id) }}" class="group block" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative rounded-[24px] overflow-hidden shadow-xl border border-green-800/50 hover:-translate-y-3 hover:shadow-2xl transition-all duration-500 bg-gradient-to-br from-[#042611] via-[#0C5130] to-[#4CAF50] h-full flex flex-col justify-between">
                        <div>
                            <!-- Image Container -->
                            <div class="w-full aspect-[16/10] overflow-hidden bg-gray-900 relative">
                                @if(Str::endsWith($item->gambar, ['.mp4', '.webm', '.ogg']))
                                    <video autoplay loop muted playsinline class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                        <source src="{{ asset('storage/image_service/' . $item->gambar) }}" type="video/mp4">
                                    </video>
                                @elseif($item->gambar)
                                    <img src="{{ asset('storage/image_service/' . $item->gambar) }}" 
                                         alt="{{ $judul }}" 
                                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out"
                                         loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-green-900">
                                        <i class="{{ $item->ikon ?? 'fas fa-desktop' }} text-4xl text-white/50"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Content -->
                            <div class="p-4 sm:p-5 pb-0">
                                <h3 class="text-base sm:text-lg font-bold text-white mb-1.5 line-clamp-2 uppercase tracking-wide group-hover:text-green-300 transition-colors">
                                    {{ $judul }}
                                </h3>
                                <p class="text-gray-200 leading-snug text-xs sm:text-sm font-light mb-1 line-clamp-2">
                                    {{ $shortDesc }}
                                </p>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="p-4 sm:p-5 pt-2 mt-auto">
                            <span class="w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white text-[#0C5130] font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full group-hover:bg-green-100 group-hover:scale-105 hover:shadow-md transition-all duration-300">
                                {{ __('Lihat Detail') }} 
                                <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</div>
    </main>
    <x-footer />
</body>
</html>
