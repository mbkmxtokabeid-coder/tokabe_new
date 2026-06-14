<style>
    /* Animasi Reveal Smooth buat Section Partner */
    @keyframes revealUpPartner {
        0% { opacity: 0; transform: translateY(50px); filter: blur(5px); }
        100% { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .partner-reveal {
        opacity: 0;
        transform: translateY(50px);
    }
    .partner-active {
        animation: revealUpPartner 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .p-delay-1 { animation-delay: 0.1s; }
    .p-delay-2 { animation-delay: 0.3s; }
    .p-delay-3 { animation-delay: 0.5s; }
</style>

<section id="contact" class="pt-0 pb-16 lg:pt-0 lg:pb-24 bg-white relative">
    <div class="max-w-[1600px] w-full mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
        
        <div class="text-center mb-12 lg:mb-16 flex flex-col items-center">
            <span class="partner-target partner-reveal p-delay-1 text-green-600 font-bold tracking-widest text-sm uppercase mb-3 block">
                {{ __('Partnership Excellence') }}
            </span>
            <h2 class="partner-target partner-reveal p-delay-2 text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 leading-tight uppercase tracking-tight">
                {!! nl2br(__('Brand Activities & Photography')) !!}
            </h2>
            <div class="partner-target partner-reveal p-delay-3 w-24 h-1.5 bg-[#63db68] mt-6 rounded-full shadow-sm"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-10 max-w-4xl mx-auto">
            
            <div class="partner-target partner-reveal bg-white rounded-[24px] overflow-hidden shadow-xl border border-gray-100 group transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl flex flex-col h-full" style="animation-delay: 0.4s">
                <div class="h-48 md:h-56 overflow-hidden relative shrink-0">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Brand Activities">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                </div>
                <div class="p-6 text-center flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 uppercase tracking-tight">{{ __('Our Brand Activities') }}</h3>
                    <p class="text-gray-600 text-sm font-light leading-relaxed mb-5 flex-grow">
                        {{ __('From marathon arrangements to tech exhibitions, we manage and elevate your brand\'s presence in large-scale outdoor events.') }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('brand') }}" class="inline-flex px-5 py-2.5 text-sm bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-full hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-md">
                            {{ __('View Activities') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="partner-target partner-reveal bg-white rounded-[24px] overflow-hidden shadow-xl border border-gray-100 group transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl flex flex-col h-full" style="animation-delay: 0.6s">
                <div class="h-48 md:h-56 overflow-hidden relative shrink-0">
                    <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Photography">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                </div>
                <div class="p-6 text-center flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 uppercase tracking-tight">{{ __('Our Photography & Videography') }}</h3>
                    <p class="text-gray-600 text-sm font-light leading-relaxed mb-5 flex-grow">
                        {{ __('Elevating your story one frame at a time with professional high-end studio photography and cinematic productions.') }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('showPhoto') }}" class="inline-flex px-5 py-2.5 text-sm bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-full hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-md">
                            {{ __('View Portfolio') }}
                        </a>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const partnerTargets = document.querySelectorAll('.partner-target');
        
        const observerPartner = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('partner-active');
                    obs.unobserve(entry.target); 
                }
            });
        }, { threshold: 0.1 });

        partnerTargets.forEach(target => observerPartner.observe(target));
    });
</script>