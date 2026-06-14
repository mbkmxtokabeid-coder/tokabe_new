@props(['activeTab' => 0, 'brands' => []])

<div class="container pricing-services-container">
   <div class="row mb-4">
    <div class="col-12">
        <div class="row g-2 justify-content-center cb-ff cb-fs-24 cb-fw-600 cb-lh-30">
            @foreach ($brands as $index => $brand)    
                <div class="col-6 col-md-auto">
                    <button type="button" 
    class="btn btn-tab w-100 {{ $activeTab == $index ? 'active' : '' }}"
    data-tab="{{ $index }}" 
    onclick="switchTab({{ $index }})">
    {{ $brand->tab_title }}
</button>
                </div>
            @endforeach
        </div>
    </div>
    </div>



    <div class="service-contents mb-30">
        @foreach ($brands as $index => $brand)    
        <div class="service-content {{ $activeTab == $index ? '' : 'd-none' }}" data-content="{{ $index }}">
            <div class="pricing-billboard-service cb-bg-color-white cb-br-20 p-4">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                        <div class="ratio ratio-16x9 pricing-billboard-service-img ">
                            <img src="{{ asset('storage/image_brand/' . $brand->gambar) }}" 
                                alt="Logo dan branding {{ $brand->nama_brand }} - Klien Tokabe.id untuk layanan periklanan OOH dan DOOH"
                                class="tran3s w-100 h-100 object-fit-cover cb-br-20"
                                loading="lazy">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="pricing-billboard-service-body">
                            <h3 class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30 mt-md-0 mt-3" style="color: orange;">
                                {{ $brand->judul }}
                            </h3>
                            <div class="cb-ff cb-fs-14 cb-fw-400 cb-lh-24 mt-3">
                                {!! $brand->deskripsi !!}
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
                            <div class="service-card">
                                <img src="{{ asset('storage/image_brand_details/' . $d['image_url']) }}" 
                                    class="service-image cb-br-20" 
                                    alt="Detail layanan {{ $d['title'] }} - {{ $d['description'] }} untuk klien {{ $brand->nama_brand }} Tokabe.id"
                                    loading="lazy">
                                <div class="text">
                                    <h3>{{ $d['title'] }}</h3>
                                    <p>{{ $d['description'] }}</p>
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