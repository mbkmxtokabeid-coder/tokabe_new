@props(['services'])

<section id="services" class="w-full bg-[#f8f9fa] py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-[54px] font-light text-gray-900 leading-tight">
                {{ __('web.supercharge_title') ?? 'Supercharge Your Business With Our Services' }}
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach ($services as $item)
                <div class="bg-white rounded-2xl p-8 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_30px_rgba(0,0,0,0.08)] transition-all duration-300 flex flex-col sm:flex-row items-start gap-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    
                    <div class="flex-1 order-2 sm:order-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            {{ app()->getLocale() == 'id' && !empty($item->title_id) ? $item->title_id : $item->judul }}
                        </h3>
                        
                        <div class="text-gray-500 mb-6 leading-relaxed line-clamp-3">
                            {!! app()->getLocale() == 'id' && !empty($item->description_id) ? $item->description_id : $item->formattedService !!}
                        </div>
                        
                        <a href="#" class="inline-flex items-center px-6 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full text-sm transition-transform hover:-translate-y-1">
                            {{ __('web.read_more') ?? 'Read More' }}
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>

                    <div class="w-16 h-16 flex-shrink-0 bg-yellow-50 text-yellow-500 rounded-2xl flex items-center justify-center text-3xl order-1 sm:order-2 mb-4 sm:mb-0">
                        <i class="{{ $item->ikon }}"></i>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>