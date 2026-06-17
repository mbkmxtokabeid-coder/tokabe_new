@props(['activeTab' => 0, 'brands' => []])

<div class="container pricing-services-container">
   <div class="row mb-4">
    <div class="col-12">
        <div class="row g-2 justify-content-center cb-ff cb-fs-24 cb-fw-600 cb-lh-30">
            @foreach ($brands as $index => $brand)    
                @php
                    $tabTitle = is_array($brand->tab_title) ? ($brand->tab_title[app()->getLocale()] ?? $brand->tab_title['en'] ?? $brand->tab_title['id'] ?? '') : ($brand->tab_title ?: $brand->getRawOriginal('tab_title'));
                @endphp
                <div class="col-6 col-md-auto">
                    <button type="button" 
    class="btn btn-tab w-100 {{ $activeTab == $index ? 'active' : '' }}"
    data-tab="{{ $index }}" 
    onclick="switchTab({{ $index }})">
    {{ $tabTitle }}
</button>
                </div>
            @endforeach
        </div>
    </div>
    </div>



    <div class="service-contents mb-30">
        @foreach ($brands as $index => $brand)    
        @php
            $judul = is_array($brand->judul) ? ($brand->judul[app()->getLocale()] ?? $brand->judul['en'] ?? $brand->judul['id'] ?? '') : ($brand->judul ?: $brand->getRawOriginal('judul'));
            $deskripsi = is_array($brand->deskripsi) ? ($brand->deskripsi[app()->getLocale()] ?? $brand->deskripsi['en'] ?? $brand->deskripsi['id'] ?? '') : ($brand->deskripsi ?: $brand->getRawOriginal('deskripsi'));
        @endphp
        <div class="service-content {{ $activeTab == $index ? '' : 'd-none' }}" data-content="{{ $index }}">
            <div class="pricing-billboard-service cb-bg-color-white cb-br-20 p-4">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                        <div class="ratio ratio-16x9 pricing-billboard-service-img ">
                            <img src="{{ asset('storage/image_brand/' . $brand->gambar) }}" 
                                alt="{{ \App\Helpers\SeoHelper::getImageAlt('brand', $brand->judul ?? $brand->nama_brand ?? 'Brand Activity') }}"
                                class="tran3s w-100 h-100 object-fit-cover cb-br-20"
                                loading="lazy">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="pricing-billboard-service-body">
                            <h3 class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30 mt-md-0 mt-3" style="color: orange;">
                                {{ $judul }}
                            </h3>
                            <div class="cb-ff cb-fs-14 cb-fw-400 cb-lh-24 mt-3">
                                {!! $deskripsi !!}
                            </div>
                        </div>
                        <div class="contact-btn cb-br-50 btn-effect cb-bg-color-brown mb-5 mb-lg-0 mt-20">
                            <a href="#" class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22 text-capitalize ps-abs">Get Now<i
                                    class="icon icon-right-arrow ml-10"></i></a>
                            <span></span>
                        </div>
                    </div>
                </div>     
                
                <!-- ADDITIONAL OPTION -->
                <div class="cb-ff mt-80 mb-20 tokabe-best-service">

                    <div class="service-wrapper">
                        <!-- Kolom Teks Keunggulan -->
                        <div class="service-left">
                            @if (isset($brand->detail) && !empty($brand->detail))
                            @foreach ($brand->detail as $d)
                            @php
                                $dTitle = is_array($d['title'] ?? '') ? ($d['title'][app()->getLocale()] ?? $d['title']['en'] ?? $d['title']['id'] ?? '') : ($d['title'] ?? '');
                                $dDesc = is_array($d['description'] ?? '') ? ($d['description'][app()->getLocale()] ?? $d['description']['en'] ?? $d['description']['id'] ?? '') : ($d['description'] ?? '');
                            @endphp
                            <div class="service-card">
                                <img src="{{ asset('storage/image_brand_details/' . $d['image_url']) }}" 
                                    class="service-image cb-br-20" 
                                    alt="{{ \App\Helpers\SeoHelper::getImageAlt('brand', $d['title'] ?? 'Brand Activity Detail') }}"
                                    loading="lazy">
                                <div class="text">
                                    <h3>{{ $dTitle }}</h3>
                                    <p>{{ $dDesc }}</p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!-- Kolom Gambar -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        function switchTab(tabIndex) {
            document.querySelectorAll('.btn-tab').forEach(btn => {
                btn.classList.remove('active');
                if (parseInt(btn.dataset.tab) === tabIndex) {
                    btn.classList.add('active');
                }
            });

            document.querySelectorAll('.service-content').forEach(content => {
                content.classList.add('d-none');
                if (parseInt(content.dataset.content) === tabIndex) {
                    content.classList.remove('d-none');
                }
            });

            history.pushState(null, null, `?tab=${tabIndex}`);
        }
    </script>
@endpush