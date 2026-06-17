<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $judulData = $event->judul ?? $event->title ?? '';
        if (is_string($judulData) && str_starts_with($judulData, '{')) {
            $judulArray = json_decode($judulData, true);
        } else {
            $judulArray = $judulData;
        }
        if (is_array($judulArray)) {
            $judulText = $judulArray[app()->getLocale()] ?? $judulArray['id'] ?? $judulArray['en'] ?? collect($judulArray)->first() ?? '';
        } else {
            $judulText = $judulArray;
        }
    @endphp
    <title>{{ $judulText }} | Tokabe.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased text-gray-900 font-sans">
    <x-navbar theme="dark" />
    <main>
<div class="min-h-screen bg-white pt-28 pb-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Main Image Header -->
        <div class="relative w-full h-[400px] md:h-[500px] rounded-3xl overflow-hidden shadow-2xl mb-12 group" data-aos="zoom-in" data-aos-duration="1000">
            @if($event->gambar)
                <img id="main-gallery-image" src="{{ asset('storage/image_portofolio/' . $event->gambar) }}" 
                     alt="{{ \App\Helpers\SeoHelper::getImageAlt('event', $judulText) }}" 
                     class="w-full h-full object-cover transition-transform duration-700 ease-in-out">
            @elseif($mainImage)
                <img id="main-gallery-image" src="{{ asset('storage/' . $mainImage->image) }}" 
                     alt="{{ \App\Helpers\SeoHelper::getImageAlt('event', $judulText) }}" 
                     class="w-full h-full object-cover transition-transform duration-700 ease-in-out">
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-image text-6xl text-gray-400"></i>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
            
            <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                @php
                    $catData = $event->category->nama_kategori ?? '';
                    if (is_string($catData) && str_starts_with($catData, '{')) {
                        $catArray = json_decode($catData, true);
                    } else {
                        $catArray = $catData;
                    }
                    if (is_array($catArray)) {
                        $namaKat = $catArray[app()->getLocale()] ?? $catArray['id'] ?? $catArray['en'] ?? collect($catArray)->first() ?? '';
                    } else {
                        $namaKat = $catArray;
                    }
                    if (empty($namaKat)) $namaKat = 'Portofolio';
                @endphp
                <span class="inline-block px-4 py-1 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold text-sm rounded-full mb-4 shadow-md">
                    {{ $namaKat }}
                </span>
                <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-2 leading-tight drop-shadow-lg">
                    {{ $judulText }}
                </h1>
                <p class="text-gray-300 font-medium flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-green-400"></i> 
                    {{ __('Published on') }} {{ $event->tanggal ? \Carbon\Carbon::parse($event->tanggal)->format('M d, Y') : $event->created_at->format('M d, Y') }}
                </p>
            </div>
        </div>

        <!-- Description — mengikuti bahasa navbar -->
        <div class="bg-gray-50 rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100 mb-16" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b-2 border-green-400 pb-2 inline-block">{{ __('Project Overview') }}</h2>
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                @php
                    $descData = $event->deskripsi ?? $event->description ?? '';
                    if (is_string($descData) && str_starts_with($descData, '{')) {
                        $descArray = json_decode($descData, true);
                        $descText = $descArray[app()->getLocale()] ?? $descArray['id'] ?? $descArray['en'] ?? collect($descArray)->first() ?? '';
                    } else {
                        $descText = $descData;
                    }
                @endphp
                {!! nl2br(e($descText)) !!}
            </div>
        </div>

        <!-- Image Gallery -->
        @if($gallery && $gallery->count() > 1)
        <div class="mb-16" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 border-b-2 border-green-400 pb-2 inline-block">{{ __('Project Gallery') }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($gallery as $image)
                    <div class="relative h-32 md:h-48 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-lg transition-all duration-300 group" 
                         onclick="changeMainImage('{{ asset('storage/' . $image->image) }}')">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ \App\Helpers\SeoHelper::getImageAlt('event', $judulText . ' Gallery ' . $loop->iteration) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('portofolio.list', $event->kategori) }}" class="inline-flex items-center gap-2 px-8 py-3 bg-gray-900 text-white font-bold rounded-full hover:bg-green-500 hover:text-white transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-arrow-left"></i> {{ __('Back to Projects') }}
            </a>
        </div>

    </div>
</div>

<script>
    function changeMainImage(url) {
        const mainImage = document.getElementById('main-gallery-image');
        if (mainImage) {
            mainImage.style.opacity = '0';
            setTimeout(() => {
                mainImage.src = url;
                mainImage.style.opacity = '1';
            }, 300);
        }
    }
</script>
    </main>
    <x-footer />
</body>
</html>