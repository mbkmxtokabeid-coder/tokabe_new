<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portofolio - {{ $category->nama_kategori }} | Tokabe.id</title>
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
                {{ $category->nama_kategori }} <span class="text-green-500 uppercase">{{ __('Projects') }}</span>
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ __('Explore our successful projects and installations in this category.') }}
            </p>
        </div>

        <!-- Portofolio Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($portfolios as $index => $item)
                <a href="{{ route('portofolio.detail', $item->id) }}" class="group block" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-2 border border-gray-100 flex flex-col h-full">
                        
                        <!-- Image Container -->
                        <div class="w-full h-56 overflow-hidden relative">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors z-10"></div>
                            
                            @if($item->firstImage)
                                <img src="{{ asset('storage/' . $item->firstImage->image_path) }}" 
                                     alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out"
                                     loading="lazy">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-gray-400"></i>
                                </div>
                            @endif

                            <div class="absolute bottom-4 right-4 bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-1 rounded-full text-sm font-bold shadow-md z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                {{ __('View Details') }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors line-clamp-2">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {!! strip_tags($item->description) !!}
                                </p>
                            </div>
                            <div class="text-green-500 font-semibold flex items-center gap-2 mt-4 text-sm">
                                <i class="fas fa-calendar-alt"></i> {{ $item->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200 shadow-sm">
                    <i class="fas fa-clipboard-list text-6xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-500 font-medium">{{ __('No portfolios available in this category yet.') }}</p>
                </div>
            @endforelse
        </div>

        <!-- Back Button -->
        <div class="mt-16 text-center">
            <a href="{{ route('portofolio') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-gray-900 text-white font-bold rounded-full hover:bg-green-500 hover:text-white transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-arrow-left"></i> {{ __('Back to Categories') }}
            </a>
        </div>

    </div>
</div>
    </main>
    <x-footer />
</body>
</html>