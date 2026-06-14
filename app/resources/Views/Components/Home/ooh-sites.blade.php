@props(['lokasiooh'])

<section class="w-full py-20 bg-[#f8f9fa]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col lg:flex-row justify-between items-end gap-6 mb-12" data-aos="fade-up">
            <div class="max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
                    {{ __('Discover Our OOH Sites') }}
                </h2>
                <p class="text-lg text-gray-500">
                    {{ __('web.ooh_description') ?? 'Jelajahi berbagai titik lokasi OOH strategis kami yang tersebar di seluruh wilayah untuk memaksimalkan jangkauan bisnis Anda.' }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($lokasiooh as $loc)
                <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_30px_rgba(0,0,0,0.08)] transition-all duration-300 group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    
                    <div class="relative h-64 overflow-hidden bg-gray-200">
                        {{-- Catatan: Sementara pakai gambar dummy dari internet buat testing UI --}}
                        <img src="{{ $loc->gambar }}" 
                             alt="{{ $loc->nama }}" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute top-4 left-4 bg-black/80 backdrop-blur-sm text-white px-4 py-1.5 rounded-full text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $loc->wilayah }}
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">{{ $loc->nama }}</h3>
                        
                        <div class="text-gray-500 mb-6 line-clamp-3 leading-relaxed text-sm">
                            {!! $loc->formattedLokasiooh !!}
                        </div>
                        
                        <a href="#" class="inline-flex items-center justify-center w-full py-3 bg-gray-50 text-gray-900 font-semibold rounded-xl transition-colors group-hover:bg-[#facc15]">
                            Read More
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>