@extends('pages.template')
@section('title', __('Tokabe.id - Our Service'))
@section('content')
    <div class="cba_demo_one">
        <div class="section-wrapper ps-rel" data-scroll-section>
            <x-navbar />
            
            @php
                $items = collect([
                    ['text' => __('Home'), 'link' => route('home')],
                    ['text' => __('Service'), 'link' => route('service')]
                ])
            @endphp
            <x-hero-breadcrumb :items="$items"/>
            
            <div class="container container-1290 mt-130">
                <div class="blog-part">
                    <div class="blog-post">
                        @foreach ($service as $s)
                            <div class="row g-0 mb-5 mt-20" data-aos="fade-up" data-aos-duration="3000">
                                <div class="col-12 col-lg-4 blog-img imghover img-effect">
                                    <figure>
                                        <img src="{{ asset('storage/image_service/' . $s->gambar) }}" 
                                             alt="blogbill" 
                                             class="cb-br-20-0" 
                                             style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px 0 0 0;" 
                                             loading="lazy">
                                    </figure>
                                </div>
                                <div class="col-12 col-lg-8 cb-bg-color-white blog-content">
                                    <div class="blog-detailes-component d-flex mb-35">
                                    </div>
                                    
                                    <h1 class="cb-ff cb-fs-32 cb-fw-600 cb-lh-38 text-capitalize">{{ $s->judul }}</h1>
                                    
                                    <p class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 cb-color-gray300 mt-40">
                                        {!! $s->deskripsi !!}
                                    </p>
                                    
                                    <div class="blog-btn cb-br-50 center mt-40 tran3s btn-effect2">
                                        <a class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22" href="{{ $serviceRoute[$s->id] ?? '#' }}">
                                            {{ __('Read More') }} <i class="icon icon-right-arrow"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
    </div>
@endsection