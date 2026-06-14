@props(['theme' => 'transparent'])

<style>
    @keyframes slideInDownNav {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .nav-anim {
        animation: slideInDownNav 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0; /* Mulai dari transparan */
    }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }
    .delay-600 { animation-delay: 0.6s; }
    .delay-700 { animation-delay: 0.7s; }
    .delay-800 { animation-delay: 0.8s; }
</style>

<nav id="main-navbar" class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-[1100px] z-50 rounded-full {{ $theme == 'dark' ? 'bg-black/90 border border-white/5 shadow-lg' : 'bg-white/10 backdrop-blur-md border border-white/20 shadow-sm' }} transition-all duration-500 ease-in-out" data-theme="{{ $theme }}">
    <div class="px-5 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16"> 
            
            <div class="flex-shrink-0 flex items-center nav-anim delay-100">
                <a href="/">
                    <img src="{{ asset('images/logo-tokabe.png') }}" 
                         alt="Tokabe.id" 
                         class="h-9 w-auto object-contain filter drop-shadow-md onError-fallback"
                         onerror="this.style.display='none'; document.getElementById('logo-text-fallback').style.display='block';">
                    <span id="logo-text-fallback" class="hidden text-xl font-bold text-white tracking-tight drop-shadow-md">
                        Tokabe<span class="text-green-400">.id</span>
                    </span>
                </a>
            </div>

            <div class="hidden xl:flex space-x-7 items-center"> 
                <a href="{{ route('home') }}" class="nav-anim delay-200 text-white hover:text-green-400 font-medium text-[15px] transition-colors drop-shadow-sm">{{ __('Home') }}</a>
                <a href="{{ url('/#service') }}" class="nav-anim delay-300 text-white hover:text-green-400 font-medium text-[15px] transition-colors drop-shadow-sm">{{ __('Service') }}</a>
                
                <div class="relative dropdown-container nav-anim delay-400">
                    <button class="dropdown-btn inline-flex items-center text-white hover:text-green-400 font-medium text-[15px] transition-colors drop-shadow-sm focus:outline-none gap-1.5 group h-8">
                        {{ __('Periklanan') }}
                        <svg class="dropdown-arrow w-4 h-4 transition-transform duration-300 transform group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu absolute left-1/2 -translate-x-1/2 top-full mt-3 w-max min-w-[220px] rounded-2xl bg-white/70 backdrop-blur-xl border border-white/60 p-2 shadow-2xl opacity-0 invisible scale-95 -translate-y-2 transition-all duration-300 origin-top z-50">
                        <a href="{{ route('services.show', 1) }}" class="block px-4 py-2.5 text-[14px] text-gray-900 hover:bg-green-500 hover:text-white rounded-xl transition-colors font-medium drop-shadow-sm whitespace-nowrap">
                            {{ __('DOOH / Videotron') }}
                        </a>
                        <a href="{{ route('services.show', 2) }}" class="block px-4 py-2.5 text-[14px] text-gray-900 hover:bg-green-500 hover:text-white rounded-xl transition-colors font-medium drop-shadow-sm whitespace-nowrap">
                            {{ __('OOH / Billboard / Baliho') }}
                        </a>
                    </div>
                </div>

                <a href="{{ route('portofolio') }}" class="nav-anim delay-500 text-white hover:text-green-400 font-medium text-[15px] transition-colors drop-shadow-sm">{{ __('Portofolio') }}</a>
                <a href="{{ route('legalitas') }}" class="nav-anim delay-600 text-white hover:text-green-400 font-medium text-[15px] transition-colors drop-shadow-sm">{{ __('Legality') }}</a>
                
                <a href="https://api.whatsapp.com/send/?phone=628115239999&text=Halo%20Admin" target="_blank" class="nav-anim delay-700 text-white hover:text-green-400 font-medium text-[15px] transition-colors drop-shadow-sm">{{ __('Contact') }}</a>
            </div>

            <div class="hidden xl:flex items-center space-x-4"> 
                
                <div class="relative dropdown-container nav-anim delay-800">
                    <button class="dropdown-btn inline-flex items-center text-white hover:text-green-400 font-medium text-[15px] transition-colors drop-shadow-sm focus:outline-none gap-1.5 group h-8">
                        <i class="fas fa-globe text-green-400 text-sm"></i>
                        {{ app()->getLocale() == 'en' ? 'Language' : 'Bahasa' }}
                        <svg class="dropdown-arrow w-4 h-4 transition-transform duration-300 transform group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu absolute right-0 top-full mt-3 w-max min-w-[150px] rounded-2xl bg-white/70 backdrop-blur-xl border border-white/60 p-2 shadow-2xl opacity-0 invisible scale-95 -translate-y-2 transition-all duration-300 origin-top-right z-50">
                        <div class="relative flex flex-col gap-1">
                            <!-- Sliding Background Indicator -->
                            <div id="lang-slider" class="absolute left-0 w-full h-[38px] bg-green-500 rounded-xl transition-transform duration-300 ease-out z-0 shadow-sm" style="transform: translateY({{ app()->getLocale() == 'en' ? '0' : '42px' }})"></div>
                            
                            <a href="{{ route('lang.switch', 'en') }}" onclick="document.getElementById('lang-slider').style.transform = 'translateY(0px)'" class="relative z-10 flex items-center justify-center h-[38px] px-4 text-[14px] rounded-xl transition-colors font-medium drop-shadow-sm whitespace-nowrap {{ app()->getLocale() == 'en' ? 'text-white' : 'text-gray-900 hover:text-green-900' }}">
                                English
                            </a>
                            <a href="{{ route('lang.switch', 'id') }}" onclick="document.getElementById('lang-slider').style.transform = 'translateY(42px)'" class="relative z-10 flex items-center justify-center h-[38px] px-4 text-[14px] rounded-xl transition-colors font-medium drop-shadow-sm whitespace-nowrap {{ app()->getLocale() == 'id' ? 'text-white' : 'text-gray-900 hover:text-green-900' }}">
                                Indonesia
                            </a>
                        </div>
                    </div>
                </div>

                <a href="https://loker.tokabe.id/" target="_blank" class="nav-anim delay-800 px-5 py-2.5 bg-gradient-to-r from-green-500 to-green-600 text-white text-[14px] font-semibold rounded-full hover:from-green-600 hover:to-green-700 hover:scale-105 transition-all duration-300 shadow-[0_0_15px_rgba(34,197,94,0.3)] flex items-center gap-2">
                    <i class="fas fa-briefcase"></i> {{ __('Career') }}
                </a>
            </div>

        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Logika Hitam Transparan pas di-scroll
        const navbar = document.getElementById('main-navbar');
        window.addEventListener('scroll', function() {
            const isDarkTheme = navbar.getAttribute('data-theme') === 'dark';
            
            if (window.scrollY > 50) {
                navbar.classList.remove('bg-white/10', 'border-white/20', 'bg-black/90');
                navbar.classList.add('bg-green-950/80', 'backdrop-blur-md', 'border-white/10', 'shadow-lg');
            } else {
                if (isDarkTheme) {
                    navbar.classList.add('bg-black/90', 'border-white/5', 'shadow-lg');
                    navbar.classList.remove('bg-white/10', 'border-white/20', 'bg-green-950/80', 'backdrop-blur-md');
                } else {
                    navbar.classList.add('bg-white/10', 'border-white/20');
                    navbar.classList.remove('bg-green-950/80', 'backdrop-blur-md', 'border-white/10', 'shadow-lg', 'bg-black/90');
                }
            }
        });

        // Logika Dropdown
        const dropdownContainers = document.querySelectorAll('.dropdown-container');
        dropdownContainers.forEach(container => {
            const btn = container.querySelector('.dropdown-btn');
            const menu = container.querySelector('.dropdown-menu');
            const arrow = container.querySelector('.dropdown-arrow');

            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = !menu.classList.contains('opacity-0');
                closeAllDropdowns();
                if (!isOpen) {
                    menu.classList.remove('opacity-0', 'invisible', 'scale-95', '-translate-y-2');
                    menu.classList.add('opacity-100', 'scale-100', 'translate-y-0');
                    if(arrow) arrow.classList.add('rotate-180');
                }
            });
        });

        document.addEventListener('click', function() { closeAllDropdowns(); });

        function closeAllDropdowns() {
            dropdownContainers.forEach(container => {
                const menu = container.querySelector('.dropdown-menu');
                const arrow = container.querySelector('.dropdown-arrow');
                menu.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
                menu.classList.add('opacity-0', 'invisible', 'scale-95', '-translate-y-2');
                if(arrow) arrow.classList.remove('rotate-180');
            });
        }
    });
</script>