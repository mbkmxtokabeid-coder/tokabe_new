<style>
    /* --- 1. Keyframes & Class buat Judul (Smooth Slide-Up) --- */
    @keyframes slideInUpSmooth {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .smooth-element {
        opacity: 0; /* Sembunyikan sebelum animasi mulai */
    }

    .smooth-active {
        /* Pake timing curve ease-out exponential biar gerakannya "mahal", nge-glide lembut di akhir */
        animation: slideInUpSmooth 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Delay cascaded/berurutan untuk teks judul */
    .title-delay-1 { animation-delay: 0.1s; } /* Subtitle */
    .title-delay-2 { animation-delay: 0.3s; } /* Main H2 */
    .title-delay-3 { animation-delay: 0.5s; } /* Yellow Bar */


    /* --- 2. Keyframes & Class buat 4 Kotak (Smooth Zoom In-Up) --- */
    @keyframes zoomInUpSmooth {
        0% { opacity: 0; transform: translateY(50px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    .box-element {
        opacity: 0; /* Sembunyikan sebelum animasi mulai */
    }

    .box-active {
        animation: zoomInUpSmooth 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Delay staggered/bergantian untuk 4 kotak sejajar */
    .box-delay-1 { animation-delay: 0.2s; }
    .box-delay-2 { animation-delay: 0.4s; }
    .box-delay-3 { animation-delay: 0.6s; }
    .box-delay-4 { animation-delay: 0.8s; }
</style>

<section id="service" class="py-16 lg:py-24 bg-white relative">
    <div class="max-w-[1600px] mx-auto px-6 sm:px-8 lg:px-12">
        
        <!-- Bagian Judul -->
        <div class="text-center mb-12 lg:mb-16 flex flex-col items-center">
            <span class="reveal-target-service smooth-element title-delay-1 text-green-600 font-bold tracking-widest text-sm uppercase mb-3 block drop-shadow-sm">
                {{ __('Our Advertising Services') }}
            </span>
            <h2 class="reveal-target-service smooth-element title-delay-2 text-3xl sm:text-4xl lg:text-5xl font-black leading-tight uppercase tracking-tight text-gray-900 drop-shadow-sm">
                {!! __('service_title_html') !!}
            </h2>
            <div class="reveal-target-service smooth-element title-delay-3 w-24 h-1.5 bg-[#63db68] mt-6 rounded-full shadow-sm"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6">
            
            @foreach($services as $index => $item)
            @php
                // Generate animation delay classes (box-delay-1 up to box-delay-4)
                $delayClass = 'box-delay-' . (($index % 4) + 1);
                
                // Get title properly handling JSON arrays if any
                $judul = is_array($item->judul) ? ($item->judul[app()->getLocale()] ?? $item->judul['id'] ?? $item->judul['en'] ?? collect($item->judul)->first() ?? '') : $item->judul;
                
                // Get description properly handling JSON arrays if any
                $deskripsi = is_array($item->deskripsi) ? ($item->deskripsi[app()->getLocale()] ?? $item->deskripsi['id'] ?? $item->deskripsi['en'] ?? collect($item->deskripsi)->first() ?? '') : $item->deskripsi;
                
                // Clean description and limit it
                $cleanDesc = strip_tags($deskripsi);
                $shortDesc = \Illuminate\Support\Str::limit($cleanDesc, 90, '...');
            @endphp
            <div onclick="window.location.href='{{ route('services.show', $item->id) }}'" class="cursor-pointer reveal-target-service box-element {{ $delayClass }} bg-gradient-to-br from-[#042611] via-[#0C5130] to-[#4CAF50] rounded-[24px] overflow-hidden shadow-xl border border-green-800/50 hover:-translate-y-3 hover:shadow-2xl transition-all duration-500 group flex flex-col justify-between">
                
                <div>
                    <!-- Bagian Gambar / Media -->
                    <div class="w-full aspect-[4/3] overflow-hidden bg-gray-900 relative">
                        @if(Str::endsWith($item->gambar, ['.mp4', '.webm', '.ogg']))
                            <video autoplay loop muted playsinline class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <source src="{{ asset('storage/image_service/' . $item->gambar) }}" type="video/mp4">
                            </video>
                        @elseif($item->gambar)
                            <img src="{{ asset('storage/image_service/' . $item->gambar) }}" alt="{{ $judul }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-green-900">
                                <i class="{{ $item->ikon ?? 'fas fa-desktop' }} text-3xl text-white/50"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Bagian Teks -->
                    <div class="p-4 lg:p-5 pb-0">
                        <h3 class="text-base lg:text-lg font-bold text-white mb-1.5 line-clamp-2 uppercase tracking-wide group-hover:text-green-300 transition-colors">
                            {{ $judul }}
                        </h3>
                        
                        <p class="text-gray-200 leading-snug text-xs lg:text-sm font-light mb-1 line-clamp-2">
                            {{ $shortDesc }}
                        </p>
                    </div>
                </div>

                <!-- Bagian Tombol -->
                <div class="px-4 lg:px-5 pb-4 lg:pb-5 pt-3 mt-auto">
                    <a href="{{ route('services.show', $item->id) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-white text-[#0C5130] font-bold text-xs uppercase tracking-wider rounded-full hover:bg-green-100 hover:scale-105 hover:shadow-md transition-all duration-300 group/btn">
                        {{ __('Lihat Detail') }} 
                        <i class="fas fa-arrow-right text-[10px] transition-transform duration-300 group-hover/btn:translate-x-1"></i>
                    </a>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const revealTargets = document.querySelectorAll('.reveal-target-service');
        
        const observerOptions = {
            root: null,
            threshold: 0.15 // Triggers relatively early so text starts flowing nicely
        };

        const serviceObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    
                    // --- A. Logika Pemicu Animasi Teks Judul ---
                    if (entry.target.classList.contains('smooth-element')) {
                         entry.target.classList.add('smooth-active');
                    }
                    
                    // --- B. Logika Pemicu Animasi Kotak ---
                    if (entry.target.classList.contains('box-element')) {
                         entry.target.classList.add('box-active');
                    }

                    obs.unobserve(entry.target); // Biar animasinya cuma jalan 1x pas di-scroll awal
                }
            });
        }, observerOptions);

        revealTargets.forEach(target => {
            serviceObserver.observe(target);
        });
    });
</script>