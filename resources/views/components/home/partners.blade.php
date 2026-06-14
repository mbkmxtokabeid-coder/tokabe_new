@props(['partners'])

<style>
    /* Marquee Animations */
    @keyframes marquee-left {
        0% { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-50%, 0, 0); }
    }
    
    @keyframes marquee-right {
        0% { transform: translate3d(-50%, 0, 0); }
        100% { transform: translate3d(0, 0, 0); }
    }

    .animate-marquee-left {
        display: flex;
        width: max-content;
        animation: marquee-left 150s linear infinite;
        will-change: transform;
    }
    
    .animate-marquee-right {
        display: flex;
        width: max-content;
        animation: marquee-right 150s linear infinite;
        will-change: transform;
    }
    
    /* Pause on hover */
    .marquee-container:hover .animate-marquee-left,
    .marquee-container:hover .animate-marquee-right {
        animation-play-state: paused;
    }

    /* Optional fade at edges */
    .mask-image-fade {
        -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
        mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
    }
</style>

<section id="partners" class="w-full bg-gradient-to-br from-[#042611] via-[#0C5130] to-[#4CAF50] py-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-[54px] font-bold text-white leading-tight">
                {{ __('Trusted by top brands') }}
            </h2>
            <p class="text-gray-100 mt-4 max-w-2xl mx-auto text-sm md:text-base">
                {{ __('We work with various partners from local and international industries to provide the best advertising solutions.') }}
            </p>
        </div>
    </div>

    @if($partners->count() > 0)
        @php
            $topRow = $partners->where('posisi', 'Atas');
            $bottomRow = $partners->where('posisi', 'Bawah');
            
            // If data is very small, duplicate to avoid empty bottom row
            if ($bottomRow->count() == 0) {
                $bottomRow = $topRow;
            }
            if ($topRow->count() == 0) {
                $topRow = $bottomRow;
            }
        @endphp

        <div class="w-full relative flex flex-col gap-4">
            <!-- Top Row: Right to Left -->
            <div class="marquee-container w-full overflow-hidden flex relative group mask-image-fade">
                <div class="animate-marquee-left flex gap-4">
                    @for ($i = 0; $i < 8; $i++)
                        @foreach ($topRow as $partner)
                            <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-center justify-center w-[180px] h-[80px] shrink-0 border border-white/20 cursor-pointer">
                                <img
                                    src="{{ $partner->gambar ? asset('storage/image_partner/' . $partner->gambar) : 'https://via.placeholder.com/200x80?text=Partner' }}"
                                    alt="{{ $partner->judul ?? 'Partner' }}"
                                    class="max-h-12 max-w-full object-contain filter hover:brightness-110 transition-all duration-300"
                                />
                            </div>
                        @endforeach
                    @endfor
                </div>
            </div>

            <!-- Bottom Row: Left to Right -->
            <div class="marquee-container w-full overflow-hidden flex relative group mask-image-fade">
                <div class="animate-marquee-right flex gap-4">
                    @for ($i = 0; $i < 8; $i++)
                        @foreach ($bottomRow as $partner)
                            <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-center justify-center w-[180px] h-[80px] shrink-0 border border-white/20 cursor-pointer">
                                <img
                                    src="{{ $partner->gambar ? asset('storage/image_partner/' . $partner->gambar) : 'https://via.placeholder.com/200x80?text=Partner' }}"
                                    alt="{{ $partner->judul ?? 'Partner' }}"
                                    class="max-h-12 max-w-full object-contain filter hover:brightness-110 transition-all duration-300"
                                />
                            </div>
                        @endforeach
                    @endfor
                </div>
            </div>
        </div>
    @endif
</section>
