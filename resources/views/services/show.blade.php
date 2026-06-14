<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ is_array($service->judul) ? ($service->judul[app()->getLocale()] ?? $service->judul['id'] ?? $service->judul['en'] ?? collect($service->judul)->first() ?? '') : $service->judul }} - Tokabe.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased text-gray-900 font-sans">
    <x-navbar />
    <main>
<div class="relative min-h-screen bg-white pb-12">
    <!-- Hero Section with Search -->
    <div class="relative bg-gradient-to-br from-green-950 via-green-900 to-emerald-900 pt-36 pb-20 px-4">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-green-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-24 -left-24 w-72 h-72 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                {{ is_array($service->judul) ? ($service->judul[app()->getLocale()] ?? $service->judul['id'] ?? $service->judul['en'] ?? collect($service->judul)->first() ?? '') : $service->judul }}
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-10">
                {{ __('Find exactly what you are looking for in our premium services.') }}
            </p>

            <!-- Search Bar -->
            <form action="{{ route('services.show', $service->id) }}" method="GET" class="max-w-2xl mx-auto relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-6 w-6 text-gray-400 group-focus-within:text-green-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                    class="block w-full pl-12 pr-32 py-4 rounded-full border-2 border-transparent bg-white shadow-xl focus:border-green-500 focus:ring-0 text-gray-900 text-lg transition-all" 
                    placeholder="{{ __('Search anything...') }}">
                <button type="submit" class="absolute inset-y-2 right-2 px-8 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-full shadow-md transform hover:scale-105 transition-all">
                    {{ __('Search') }}
                </button>
            </form>
        </div>
    </div>

    <!-- Cards Grid Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        @if(count($items) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($items as $item)
                    <div onclick="window.location.href='{{ isset($item->detail_url) ? $item->detail_url : route('dummy.detail') }}'" class="cursor-pointer group relative bg-white rounded-[24px] shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:-translate-y-2 flex flex-col h-full">
                        
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $item->image }}" alt="Image" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-1.5 bg-gradient-to-r from-green-500 to-green-600 text-white text-xs font-bold uppercase tracking-wider rounded-full shadow-lg">
                                    {{ is_array($service->judul) ? ($service->judul[app()->getLocale()] ?? $service->judul['id'] ?? $service->judul['en'] ?? collect($service->judul)->first() ?? '') : $service->judul }}
                                </span>
                            </div>
                        </div>

                        <!-- Content Container -->
                        <div class="p-8 flex flex-col flex-grow bg-white">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-green-600 transition-colors line-clamp-2">
                                {{ $item->title }}
                            </h3>
                            
                            <p class="text-gray-600 mb-6 flex-grow line-clamp-3">
                                {!! strip_tags($item->description) !!}
                            </p>

                            <!-- Button Area -->
                            <div class="pt-6 border-t border-gray-100 mt-auto">
                                <a href="{{ isset($item->detail_url) ? $item->detail_url : route('dummy.detail') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-sm font-bold uppercase tracking-widest rounded-full shadow-md transform hover:scale-105 transition-all duration-300">
                                    Read More 
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- No Results State -->
            <div class="bg-white rounded-3xl shadow-xl p-16 text-center border border-gray-100 mt-8">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-green-100 text-green-600 mb-6">
                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('No Results Found') }}</h2>
                <p class="text-gray-600 text-lg max-w-md mx-auto">
                    {{ __('We couldn\'t find anything matching your search. Try adjusting your keywords.') }}
                </p>
                <a href="{{ route('services.show', $service->id) }}" class="inline-block mt-8 px-8 py-3 bg-gray-900 text-white font-semibold rounded-full hover:bg-gray-800 transition-colors">
                    {{ __('Clear Search') }}
                </a>
            </div>
        @endif
    </div>
    </main>
    <x-footer />
</body>
</html>