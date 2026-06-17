<style>
    em {
        font-style: normal;
        font-weight: bold;
        color: #ffaa00;
    }

    .description-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .form-control {
        width: 100%;
        padding: 10px 15px;
        font-size: 1rem;
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    .form-control:focus {
        outline: none;
        border-color: #ffaa00;
        box-shadow: 0 0 5px rgba(255, 170, 0, 0.5);
    }

    .search-button {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 0 8px 8px 0;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .not-found{
        width: 100%;
        height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .not-found-container {
        background-color: #1D1D3E;
        color: #EBD136;
        max-width: 400px;
        height: fit-content;
        padding: 2rem;
        border-radius: 1rem;
        margin: 2rem auto;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .not-found-icon {
        background-color: #EBD136;
        color: #000000;
        display: inline-flex;
        padding: 1rem;
        border-radius: 50%;
        margin-bottom: 1rem;
    }

    .n-icon {
        width: 32px;
        height: 32px;
    }

    .not-found-text {
        font-size: 1.25rem;
        font-weight: 600;
        font-family: "Poppins", sans-serif ;
    }

</style>
@extends('pages.template')
@if ($billboard === 'DOOH')
    @section('title', __('Tokabe.id - DOOH Location'))
@else
    @section('title', __('Tokabe.id - OOH Location'))
@endif
@section('content')

        <div class="cba_demo_one">
        <!-- Preloder Start -->
        <!-- Preloder End -->
        <!-- Header  and Hero start-->
        <div class="section-wrapper ps-rel" data-scroll-section>
            <x-navbar />
            @php
                $items = collect([
                    ['text' => 'Home', 'link' => 'home'],
                    ['text' => $billboard, 'link' => route('ourLocation', $billboard)]
                ]);

                if ($billboard === 'OOH') {
                    $items->splice(1, 0, [['text' => __('OOH Location'), 'link' => route('showwilayah')]]);
                }

                $breadcrumbTitle = $lokasiCount . ' Lokasi';
            @endphp
            <x-hero-breadcrumb :items="$items" :breadcrumbTitle="$breadcrumbTitle"/>
            <!-- Header and Hero End -->

            <!-- blog-part-start -->
            <div class="container container-1290 mt-130">
                <div class="blog-part">
                    <!-- Search Bar -->
                    <form method="GET" action="{{ route('ourLocation', $billboard) }}" class="mb-5 text-center">
                        <h2 class="cb-ff cb-fs-36 cb-fw-600 mb-4">{{ __('Search Strategic Location') }}</h2>
                        <input type="text" name="s" class="form-control d-inline-block w-50 cb-ff"
                            placeholder="{{ __('Search Strategic Location') }}" value="{{ request('s') }}" />
                        <button type="submit" class="btn btn-primary cb-ff mt-0" style="padding: 10px 20px; border-radius: 8px 8px 8px 8px; cursor: pointer;">{{ __('Search') }}</button>
                    </form>

                    @if (count($lokasi) > 0)
                        @foreach ($lokasi as $loc)
                            <div class="row g-0 mb-5" data-aos="fade-up" data-aos-duration="3000">
                                <div class="col-12 col-lg-4 blog-img imghover img-effect">
                                    <figure>
                                        <img src="{{ asset('storage/' . $loc->formattedGambar) }}" 
                                             alt="{{ \App\Helpers\SeoHelper::getImageAlt($billboard, $loc->nama, $loc->wilayah ?? $loc->provinsi ?? 'Medan') }}"
                                             class="cb-br-20-0"
                                             style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px 0 0 0;"
                                             loading="lazy">
                                    </figure>
                                </div>
                                <div class="col-12 col-lg-8 cb-bg-color-white blog-content">
                                    <h1 class="lokasi-nama cb-ff cb-fs-32 cb-fw-600 cb-lh-38 text-capitalize">
                                        @php $__ln = $loc->nama; echo is_array($__ln) ? ($__ln[app()->getLocale()] ?? $__ln['id'] ?? $__ln['en'] ?? '') : $__ln; @endphp
                                    </h1>
                                    <p class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 cb-color-gray300 mt-40 description-clamp mb-4">
                                        @php $__ld = $loc->deskripsi_lokasi; echo is_array($__ld) ? ($__ld[app()->getLocale()] ?? $__ld['id'] ?? $__ld['en'] ?? '') : $__ld; @endphp
                                    </p>
                                    <div class="blog-btn cb-br-50 center mt-40 tran3s btn-effect2">
                                        @php
                                            $route = 'showlokasi';
                                            $param = $loc->nama;
                                            if ($billboard === 'OOH') {
                                                $route = 'showlokasiooh';
                                                $param = $loc->id; // use id for OOH links
                                            }
                                        @endphp
                                        <a class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22"
                                            href="{{ route($route, $param) }}">{{ __('Read More') }}<i class="icon icon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $lokasi->links('vendor.pagination.custom-pagination') }}
                    @else
                        <div class="not-found">
                            <div class="not-found-container">
                                <div class="not-found-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="n-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 5.5C7.805 5.5 4.5 8.805 4.5 13S7.805 20.5 12 20.5 19.5 17.195 19.5 13 16.195 5.5 12 5.5z"/>
                                    </svg>
                                </div>
                                <h2 class="not-found-text">
                                    {{ __('We can\'t find what you are looking for') }}
                                </h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- blog-part-end -->
        </div>
        <!-- section-wrapper end -->
    </div>
    <!-- cba_demo_one end -->

@endsection