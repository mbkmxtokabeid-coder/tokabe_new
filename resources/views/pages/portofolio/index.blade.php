<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portofolio | Tokabe.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased text-gray-900 font-sans">
    <x-navbar theme="dark" />
    <main>
<div class="min-h-screen bg-white pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                {!! nl2br(__('Our Recent Portofolio')) !!}
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ __('Showcasing Videotron Advertising Installations and Experiential Brand Activation Across Sumatra') }}
            </p>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($categories as $index => $item)
                <a href="{{ route('portofolio.list', $item->id) }}" class="group block" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2 bg-gray-50">
                        <!-- Image Container -->
                        <div class="w-full h-64 overflow-hidden relative">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors z-10"></div>
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default-category.jpg') }}" 
                                 alt="{{ $item->nama_kategori }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out"
                                 loading="lazy">
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8 text-center bg-white border-t-4 border-green-400">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-green-500 transition-colors">
                                {{ $item->nama_kategori }}
                            </h3>
                            <p class="text-gray-500 font-medium flex justify-center items-center gap-2">
                                <i class="fas fa-folder-open text-green-500"></i>
                                {{ $item->portofolios()->count() }} {{ __('Projects') }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                    <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-500 font-medium">{{ __('No portfolio categories available yet.') }}</p>
                </div>
            @endforelse
        </div>

    </div>
</div>
    </main>
    <x-footer />
</body>
</html>