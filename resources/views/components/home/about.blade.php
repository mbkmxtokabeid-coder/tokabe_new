<style>
    /* --- Sihir Animasi Masuk (Reveal) --- */
    
    /* Teks Masuk dari Kiri */
    @keyframes revealFromLeft {
        0% { opacity: 0; transform: translateX(-100px) skewX(-10deg); filter: blur(10px); }
        100% { opacity: 1; transform: translateX(0) skewX(0deg); filter: blur(0); }
    }

    /* Kotak Masuk dari Kanan */
    @keyframes revealFromRight {
        0% { opacity: 0; transform: translateX(100px); filter: blur(10px); }
        100% { opacity: 1; transform: translateX(0); filter: blur(0); }
    }

    .reveal-left-hidden { opacity: 0; }
    .reveal-right-hidden { opacity: 0; }

    /* Class Aktif pas di-scroll */
    .reveal-left-active {
        animation: revealFromLeft 1.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .reveal-right-active {
        animation: revealFromRight 1.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    /* Delay biar munculnya berurutan estetik */
    .delay-text { animation-delay: 0.1s; }
    .delay-box-1 { animation-delay: 0.4s; }
    .delay-box-2 { animation-delay: 0.7s; }
</style>

<section id="about" class="py-24 bg-white overflow-hidden">
    <div class="max-w-[1600px] mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            
            <div class="reveal-target-left reveal-left-hidden delay-text pr-0 lg:pr-8">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-semibold text-gray-900 leading-snug uppercase tracking-tight">
                    {!! __('More than hundreds of locations in Sumatera') !!}
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 w-full">
                
                <div class="reveal-target-right reveal-right-hidden delay-box-1 bg-gray-50 rounded-[32px] p-8 lg:p-10 border border-gray-100 shadow-md text-center flex flex-col justify-center items-center group hover:-translate-y-3 hover:shadow-2xl transition-all duration-500">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-green-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-tv"></i>
                    </div>
                    <div class="flex items-baseline justify-center text-gray-900 mb-2">
                        <span class="rolling-counter text-5xl lg:text-6xl font-black tracking-tight" data-target="18">0</span>
                        <span class="text-2xl font-black text-green-500 ml-1">+</span>
                    </div>
                    <h4 class="text-base font-bold text-gray-500 uppercase tracking-widest">DOOH / VIDEOTRON</h4>
                </div>

                <div class="reveal-target-right reveal-right-hidden delay-box-2 bg-gray-50 rounded-[32px] p-8 lg:p-10 border border-gray-100 shadow-md text-center flex flex-col justify-center items-center group hover:-translate-y-3 hover:shadow-2xl transition-all duration-500">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-green-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="flex items-baseline justify-center text-gray-900 mb-2">
                        <span class="rolling-counter text-5xl lg:text-6xl font-black tracking-tight" data-target="271">0</span>
                        <span class="text-2xl font-black text-green-500 ml-1">+</span>
                    </div>
                    <h4 class="text-base font-bold text-gray-500 uppercase tracking-widest">OOH / BILLBOARD</h4>
                </div>

            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. LOGIKA ROLLING COUNTER (Existing)
        const counters = document.querySelectorAll('.rolling-counter');
        
        const startCounting = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute('data-target');
                    const duration = 2500; 
                    const countPerFrame = target / (duration / 16); 
                    let current = 0;
                    const updateCounter = () => {
                        current += countPerFrame;
                        if (current >= target) { counter.innerText = target; } 
                        else { counter.innerText = Math.floor(current); requestAnimationFrame(updateCounter); }
                    };
                    requestAnimationFrame(updateCounter);
                    observer.unobserve(counter); 
                }
            });
        };

        const counterObserver = new IntersectionObserver(startCounting, { threshold: 0.3 });
        counters.forEach(counter => counterObserver.observe(counter));

        // 2. LOGIKA REVEAL ANIMATION (NEW!)
        const revealLeft = document.querySelectorAll('.reveal-target-left');
        const revealRight = document.querySelectorAll('.reveal-target-right');

        const revealOnScroll = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('reveal-target-left')) {
                        entry.target.classList.add('reveal-left-active');
                    } else {
                        entry.target.classList.add('reveal-right-active');
                    }
                    observer.unobserve(entry.target);
                }
            });
        };

        const revealObserver = new IntersectionObserver(revealOnScroll, { threshold: 0.15 });
        revealLeft.forEach(el => revealObserver.observe(el));
        revealRight.forEach(el => revealObserver.observe(el));
    });
</script>