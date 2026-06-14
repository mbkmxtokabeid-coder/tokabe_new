@props(['lokasi'])

<style>
    /* Animasi Masuk Teks Judul DOOH */
    @keyframes slideInUpDOOH {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .dooh-title-hidden {
        opacity: 0;
        transform: translateY(40px);
    }
    .dooh-title-active {
        animation: slideInUpDOOH 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Animasi Masuk Kotak DOOH (Zoom In Up) */
    @keyframes doohBoxEnter {
        0% { opacity: 0; transform: translateY(50px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    .dooh-box-hidden {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
    }
    .dooh-box-active {
        animation: doohBoxEnter 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-500 { animation-delay: 0.5s; }
</style>

<section id="dooh" class="w-full bg-gradient-to-br from-[#042611] via-[#0C5130] to-[#4CAF50] pt-16 pb-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="dooh-observe dooh-title-hidden delay-100 text-4xl md:text-5xl font-black text-white tracking-tight">
                {{ __('Discover Our DOOH Sites') }}
            </h2>
            <p class="dooh-observe dooh-title-hidden delay-300 text-gray-100 mt-4 text-lg font-light">
                {{ __('Billboard advertising is a powerful marketing tool to gain visibility and reach target audiences.') }}
            </p>
            <div class="dooh-observe dooh-title-hidden delay-500 w-24 h-1.5 bg-gradient-to-r from-green-500 to-green-600 mt-6 rounded-full shadow-sm"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            @foreach($lokasi->take(2) as $item)
            <div onclick="window.location.href='{{ route('dooh.detail', $item->id) }}'" class="dooh-box-observe dooh-box-hidden relative bg-black rounded-3xl shadow-xl aspect-video group cursor-pointer border border-white/10" style="animation-delay: {{ 0.2 + ($loop->index * 0.3) }}s">
                
                <div class="absolute inset-0 rounded-3xl overflow-hidden">
                    <img src="{{ $item->gambar ? asset('storage/image_lokasi/' . $item->gambar) : 'https://images.unsplash.com/photo-1542204165-65bf26472b9b?q=80&w=600&auto=format&fit=crop' }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>

                <!-- White Box Container -->
                <div class="absolute bottom-0 left-4 sm:left-5 right-4 sm:right-5 bg-white rounded-2xl p-4 sm:p-5 shadow-xl transform translate-y-1/2 transition-transform duration-500 ease-out z-20">
                    @php
                        $namaData = $item->nama ?: $item->getRawOriginal('nama');
                        $namaDOOH = is_array($namaData) ? ($namaData[app()->getLocale()] ?? $namaData['id'] ?? $namaData['en'] ?? collect($namaData)->first() ?? '') : $namaData;
                        if (empty(trim($namaDOOH))) {
                            $namaDOOH = $item->provinsi . ' - ' . $item->media;
                        }

                        $descData = $item->deskripsi_lokasi ?: $item->getRawOriginal('deskripsi_lokasi');
                        $descDOOH = is_array($descData) ? ($descData[app()->getLocale()] ?? $descData['id'] ?? $descData['en'] ?? collect($descData)->first() ?? '') : $descData;
                        if (empty(trim(strip_tags($descDOOH)))) {
                            $tagData = $item->tagline ?: $item->getRawOriginal('tagline');
                            $descDOOH = is_array($tagData) ? ($tagData[app()->getLocale()] ?? $tagData['id'] ?? $tagData['en'] ?? collect($tagData)->first() ?? '') : $tagData;
                        }
                    @endphp
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug mb-1 transition-colors group-hover:text-green-600 line-clamp-1">
                        {{ __($namaDOOH) }}
                    </h3>
                    <p class="text-gray-600 line-clamp-2 text-xs sm:text-sm font-normal leading-relaxed">
                        {{ __(strip_tags($descDOOH)) }}
                    </p>
                </div>

                <div class="absolute top-4 right-4 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="bg-gradient-to-r from-green-500 to-green-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">{{ __('View Detail') }} <i class="fas fa-arrow-right ml-1"></i></span>
                </div>

            </div>
            @endforeach
            
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observerOptions = { root: null, threshold: 0.15 };

        const doohObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('dooh-observe')) {
                        entry.target.classList.add('dooh-title-active');
                    }
                    if (entry.target.classList.contains('dooh-box-observe')) {
                        entry.target.classList.add('dooh-box-active');
                    }
                    obs.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.dooh-observe, .dooh-box-observe').forEach(el => doohObserver.observe(el));
    });
</script>
