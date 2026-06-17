<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $namaLokasi = is_string($lokasiooh->nama) && str_starts_with($lokasiooh->nama, '{') ? json_decode($lokasiooh->nama, true) : $lokasiooh->nama;
        $namaLokasi = is_array($namaLokasi) ? (($namaLokasi[app()->getLocale()] ?? '') ?: ($namaLokasi['id'] ?? '') ?: ($namaLokasi['en'] ?? '') ?: (collect($namaLokasi)->first() ?? '')) : $namaLokasi;
    @endphp
    <title>{{ $namaLokasi }} - Tokabe.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased text-gray-900 font-sans">
    <x-navbar theme="dark" />
    <main>
        <!-- Hero Section -->
        <div class="relative w-full h-[50vh] md:h-[60vh] bg-gray-900 overflow-hidden">
            @php
                $namaLokasi = is_string($lokasiooh->nama) && str_starts_with($lokasiooh->nama, '{') ? json_decode($lokasiooh->nama, true) : $lokasiooh->nama;
                $namaLokasi = is_array($namaLokasi) ? ($namaLokasi[app()->getLocale()] ?? $namaLokasi['id'] ?? $namaLokasi['en'] ?? collect($namaLokasi)->first() ?? '') : $namaLokasi;
            @endphp
            <div class="absolute inset-0">
                <img src="{{ $lokasiooh->gambar ? asset('storage/image_lokasiooh/' . $lokasiooh->gambar) : 'https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1200&auto=format&fit=crop' }}" alt="{{ \App\Helpers\SeoHelper::getImageAlt('ooh', $namaLokasi, $lokasiooh->kota ?? 'Medan') }}" class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
            </div>
            <div class="relative h-full flex flex-col items-center justify-center text-center px-4 max-w-5xl mx-auto pt-28">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 uppercase tracking-tight shadow-sm">{{ $namaLokasi }}</h1>
                <p class="text-xl text-gray-200 font-medium tracking-wide">{{ __('SUPER LOCATION and EYE-CATCHING OOH Billboard in Sumatera') }}</p>
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-16 relative z-10">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    
                    <!-- Left Column: Description & Map -->
                    <div class="lg:col-span-2 space-y-10">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __('Point of Interest') }}</h2>
                            <div class="prose prose-lg text-gray-600 max-w-none">
                                @php
                                    $descLokasi = is_string($lokasiooh->deskripsi_lokasi) && str_starts_with($lokasiooh->deskripsi_lokasi, '{') ? json_decode($lokasiooh->deskripsi_lokasi, true) : $lokasiooh->deskripsi_lokasi;
                                    $descLokasi = is_array($descLokasi) ? (($descLokasi[app()->getLocale()] ?? '') ?: ($descLokasi['id'] ?? '') ?: ($descLokasi['en'] ?? '') ?: (collect($descLokasi)->first() ?? '')) : $descLokasi;
                                @endphp
                                {!! $descLokasi !!}
                            </div>
                        </div>

                        <!-- Map -->
                        @if($lokasiooh->koordinat)
                        <div class="rounded-2xl overflow-hidden shadow-md border border-gray-100">
                            <iframe
                                src="https://www.google.com/maps?q={{ $lokasiooh->koordinat }}&hl=es;z=14&output=embed"
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        @endif
                    </div>

                    <!-- Right Column: Specs & Traffic -->
                    <div class="space-y-8">
                        <!-- Traffic Stats -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 border border-green-100">
                            <h3 class="text-2xl font-bold text-green-900 mb-6">{{ __('Vehicle / Day') }}</h3>
                            <div class="space-y-4">
                                <div class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm">
                                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl">
                                        <i class="fa-solid fa-car"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500 font-medium">{{ __('Car') }}</div>
                                        <div class="text-xl font-bold text-gray-900">{{ $lokasiooh->mobil ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm">
                                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl">
                                        <i class="fa-solid fa-motorcycle"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500 font-medium">{{ __('Motorcycle') }}</div>
                                        <div class="text-xl font-bold text-gray-900">{{ $lokasiooh->motor ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Specifications Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Media -->
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow group">
                                <div class="w-10 h-10 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-photo-film"></i>
                                </div>
                                <div class="text-xs text-gray-400 font-bold uppercase mb-1">{{ __('Media') }}</div>
                                <div class="text-sm font-semibold text-gray-900">{{ $lokasiooh->media ?? '-' }}</div>
                            </div>
                            <!-- Type -->
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow group">
                                <div class="w-10 h-10 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-expand"></i>
                                </div>
                                <div class="text-xs text-gray-400 font-bold uppercase mb-1">{{ __('Type') }}</div>
                                <div class="text-sm font-semibold text-gray-900">{{ $lokasiooh->type ?? '-' }}</div>
                            </div>
                            <!-- Size -->
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow group">
                                <div class="w-10 h-10 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                                </div>
                                <div class="text-xs text-gray-400 font-bold uppercase mb-1">{{ __('Size') }}</div>
                                <div class="text-sm font-semibold text-gray-900">{{ $lokasiooh->size ?? '-' }}</div>
                            </div>
                            <!-- Lighting -->
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow group">
                                <div class="w-10 h-10 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-lightbulb"></i>
                                </div>
                                <div class="text-xs text-gray-400 font-bold uppercase mb-1">{{ __('Lighting') }}</div>
                                <div class="text-sm font-semibold text-gray-900">{{ $lokasiooh->lighting ?? '-' }}</div>
                            </div>
                        </div>
                        
                        @php
                            $oohContact = isset($siteContacts['OOH Contact']) ? $siteContacts['OOH Contact'] : null;
                            $oohPhone = $oohContact ? $oohContact->phone : '628115239999';
                            $oohMessage = $oohContact && $oohContact->message != 'Halo Admin Tokabe' 
                                            ? urlencode($oohContact->message) . '%20' . urlencode($namaLokasi)
                                            : urlencode('Hello, I am interested in OOH Location: ') . urlencode($namaLokasi);
                            $oohUrl = "https://wa.me/{$oohPhone}?text={$oohMessage}";
                        @endphp
                        <a href="{{ $oohUrl }}" target="_blank" class="block w-full py-4 px-6 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold text-center rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                            <i class="fa-brands fa-whatsapp mr-2"></i> {{ __('Contact via WhatsApp') }}
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer />
</body>
</html>
