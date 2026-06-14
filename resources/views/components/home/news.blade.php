@props(['news'])

<style>
    /* Animasi Masuk Teks Judul News */
    @keyframes slideInUpNews {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .news-title-hidden {
        opacity: 0;
        transform: translateY(40px);
    }
    .news-title-active {
        animation: slideInUpNews 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Animasi Masuk Kotak Video (Zoom In Up) */
    @keyframes videoBoxEnter {
        0% { opacity: 0; transform: translateY(50px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    .video-box-hidden {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
    }
    .video-box-active {
        animation: videoBoxEnter 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-500 { animation-delay: 0.5s; }
</style>

<section id="news" class="w-full bg-white py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="news-observe news-title-hidden delay-100 text-4xl md:text-5xl font-black text-gray-900 tracking-tight">
                Latest News & Articles
            </h2>
            <p class="news-observe news-title-hidden delay-300 text-gray-500 mt-4 text-lg font-light">
                Ikuti perkembangan tren periklanan OOH & DOOH terbaru bersama kami.
            </p>
            <div class="news-observe news-title-hidden delay-500 w-24 h-1.5 bg-yellow-400 mt-6 rounded-full shadow-sm"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            @foreach($news as $item)
            <div class="news-box-observe video-box-hidden relative bg-black rounded-3xl overflow-hidden shadow-xl aspect-video group cursor-pointer border border-gray-100" style="animation-delay: {{ 0.2 + ($loop->index * 0.3) }}s">
                
                <img src="{{ $item->gambar }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">

                <div class="absolute inset-x-0 bottom-0 h-[90%] bg-gradient-to-t from-black via-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>

                <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8 transform translate-y-10 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out z-20 flex flex-col justify-end pointer-events-none">
                    <span class="text-green-400 font-bold text-xs sm:text-sm tracking-widest uppercase mb-2 drop-shadow-md">
                        {{ $item->tanggal }}
                    </span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug mb-2 sm:mb-3 drop-shadow-lg">
                        {{ $item->judul }}
                    </h3>
                    <p class="text-gray-200 line-clamp-2 text-sm drop-shadow-md font-light">
                        {{ $item->ringkasan }}
                    </p>
                </div>

            </div>
            @endforeach
            
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observerOptions = { root: null, threshold: 0.15 };

        const newsObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('news-observe')) {
                        entry.target.classList.add('news-title-active');
                    }
                    if (entry.target.classList.contains('news-box-observe')) {
                        entry.target.classList.add('video-box-active');
                    }
                    obs.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.news-observe, .news-box-observe').forEach(el => newsObserver.observe(el));
    });
</script>