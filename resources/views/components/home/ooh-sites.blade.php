@props(['lokasiooh'])

@php
    // 🪄 SIHIR MIMI: Kita buat data dummy cadangan biar 3 kotak tetap terisi penuh dan estetik!
    $dummyOoh = [
        (object)[
            'id' => 1,
            'nama' => 'Jl. Gatot Subroto (Simpang Majestik)',
            'kota' => 'Medan Prime',
            'tipe' => 'Videotron',
            'ukuran' => '4m x 8m',
            'gambar' => 'https://images.unsplash.com/photo-1506146332389-18140dc7b2fb?q=80&w=800&auto=format&fit=crop'
        ],
        (object)[
            'id' => 2,
            'nama' => 'Jl. Jend. Sudirman (Kawasan CBD)',
            'kota' => 'Medan Center',
            'tipe' => 'Billboard',
            'ukuran' => '5m x 10m',
            'gambar' => 'https://images.unsplash.com/photo-1542204165-65bf26472b9b?q=80&w=800&auto=format&fit=crop'
        ],
        (object)[
            'id' => 3,
            'nama' => 'Jl. S. Parman (Cambridge Area)',
            'kota' => 'Medan Premium',
            'tipe' => 'Videotron',
            'ukuran' => '4m x 6m',
            'gambar' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?q=80&w=800&auto=format&fit=crop'
        ]
    ];

    // Cek: Kalau data asli kurang dari 3, paksain pakai dummy biar layoutnya gak bolong!
    $displayData = (is_countable($lokasiooh) && count($lokasiooh) >= 3) ? collect($lokasiooh)->take(3) : $dummyOoh;
@endphp

<style>
    @keyframes slideInUpOOH {
        0% { opacity: 0; transform: translateY(50px); filter: blur(5px); }
        100% { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .ooh-element {
        opacity: 0; 
        transform: translateY(50px);
    }
    .ooh-active {
        animation: slideInUpOOH 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .ooh-delay-title { animation-delay: 0.1s; }
</style>

<section id="portofolio" class="py-24 bg-white overflow-hidden">
    <div class="max-w-[1600px] mx-auto px-6 sm:px-8 lg:px-12">
        
        <div class="text-center mb-20 flex flex-col items-center">
            <span class="ooh-observe ooh-element ooh-delay-title text-green-600 font-bold tracking-widest text-sm uppercase mb-3 block">
                {{ __('Premium Inventory') }}
            </span>
            <h2 class="ooh-observe ooh-element ooh-delay-title text-4xl md:text-5xl font-black text-gray-900 leading-tight uppercase tracking-tight">
                {!! nl2br(__('Our Strategic OOH Advertising Sites')) !!}
            </h2>
            <div class="ooh-observe ooh-element ooh-delay-title w-28 h-2 bg-gradient-to-r from-green-500 to-green-600 mt-6 rounded-full shadow-sm"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
            
            @foreach($displayData as $index => $item)
            <div onclick="window.location.href='{{ route('ooh.detail', $item->id) }}'" class="cursor-pointer ooh-observe ooh-element bg-gradient-to-br from-[#042611] via-[#0C5130] to-[#4CAF50] rounded-[32px] overflow-hidden shadow-xl border border-green-800/50 hover:-translate-y-3 hover:shadow-2xl transition-all duration-500 group flex flex-col justify-between" 
                 style="animation-delay: {{ 0.2 + ($index * 0.2) }}s">
                
                <div>
                    <div class="w-full aspect-[4/3] overflow-hidden bg-gray-900 relative">
                        <img src="{{ Str::startsWith($item->gambar, 'http') ? $item->gambar : asset('storage/image_lokasiooh/' . $item->gambar) }}" 
                             alt="{{ is_array($item->nama) ? ($item->nama[app()->getLocale()] ?? collect($item->nama)->first() ?? '') : $item->nama }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <span class="absolute top-5 left-5 px-4 py-2 bg-black/70 backdrop-blur-md text-green-400 text-xs font-bold uppercase tracking-widest rounded-full shadow-md">
                            {{ $item->kota ?? 'Medan' }}
                        </span>
                    </div>

                    <div class="p-8">
                        <h3 class="text-xl font-bold text-white mb-4 line-clamp-2 uppercase tracking-wide group-hover:text-green-300 transition-colors">
                            @php
                                $namaData = is_array($item->nama) ? ($item->nama[app()->getLocale()] ?? $item->nama['id'] ?? $item->nama['en'] ?? collect($item->nama)->first() ?? '') : $item->nama;
                            @endphp
                            {{ __($namaData) }}
                        </h3>
                        
                        <div class="grid grid-cols-2 gap-4 border-t border-white/20 pt-4 text-sm text-gray-200">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-layer-group text-green-300"></i>
                                <span>{{ $item->tipe ?? $item->type ?? 'Billboard' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-expand-arrows-alt text-green-300"></i>
                                <span>{{ $item->ukuran ?? $item->size ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8 pt-2">
                    <a href="{{ route('ooh.detail', $item->id) }}" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white text-[#0C5130] font-bold text-sm uppercase tracking-wider rounded-full hover:bg-green-100 hover:scale-105 hover:shadow-md transition-all duration-300 group/btn">
                        {{ __('View Detail') }} 
                        <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover/btn:translate-x-1"></i>
                    </a>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const oohTargets = document.querySelectorAll('.ooh-observe');
        
        const observerOptions = {
            root: null,
            threshold: 0.1
        };

        const oohObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('ooh-active');
                    obs.unobserve(entry.target); 
                }
            });
        }, observerOptions);

        oohTargets.forEach(target => {
            oohObserver.observe(target);
        });
    });
</script>