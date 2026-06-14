@extends('pages.template')
@section('title', 'Tokabe.id - OOH Location')
@section('content')
        <div class="cba_demo_one">
            <div class="section-wrapper  ps-rel" data-scroll-section>
                <x-navbar />
                @php
    $items = collect([
        ['text' => app()->getLocale() == 'id' ? 'Beranda' : 'Home', 'link' => route('home')],
        ['text' => app()->getLocale() == 'id' ? 'Lokasi OOH' : 'OOH Location', 'link' => route('showwilayah')]
    ]);
    $breadcrumbTitle = app()->getLocale() == 'id' ? $LokasiOOHCount . ' Lokasi' : $LokasiOOHCount . ' Locations';
                @endphp
                <x-hero-breadcrumb :items="$items" :breadcrumbTitle="$breadcrumbTitle"/>
                <div class="container container-1290 mt-130">
                    <div class="service-part">
                        <form method="GET" action="{{ route('ourLocation', ['billboard' => 'OOH']) }}" class="mb-5 text-center">
                            <h2 class="cb-ff cb-fs-36 cb-fw-600 mb-4">{{ app()->getLocale() == 'id' ? 'Cari Lokasi Strategis' : 'Search Strategic Location' }}</h2>
                            <input type="text" name="s" class="form-control d-inline-block w-50 cb-ff" placeholder="{{ app()->getLocale() == 'id' ? 'Cari Lokasi Strategis' : 'Search Strategic Location' }}"
                                value="{{ request('s') }}" />
                            <button type="submit" class="btn btn-primary cb-ff mt-0"
                                style="padding: 10px 20px; border-radius: 8px 8px 8px 8px; cursor: pointer;">{{ app()->getLocale() == 'id' ? 'Cari' : 'Search' }}</button>
                        </form>
                        <div class="row">
                            @foreach ($wilayah as $item)
                                <div class="col-12 col-lg-4 mt-10" data-aos="flip-left" data-aos-duration="3000">
                                    <div class="features">
                                        <div class="features-content cb-bg-color-white p-4 cb-br-10 mt-10"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <div>
                                                <h4 class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30">{{ ucfirst($item->wilayah) }}</h4>
                                                @if (isset($item->jumlah))
                                                    <h5 class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 cb-color-gray300 mt-25 ml-10 text-capitalize">
                                                        {{ $item->jumlah }} {{ app()->getLocale() == 'id' ? 'Lokasi' : 'Location' }}
                                                    </h5>
                                                @endif
                                                <div class="features-button">
                                                    <div class="btn-effect cb-bg-color-brown mt-25"
                                                        style="width: 160px; height: 30px;">
                                                        <a href="/our-location/OOH?wilayah={{ $item->wilayah }}"
                                                            data-hover="{{ app()->getLocale() == 'id' ? 'Baca Selengkapnya' : 'Read More' }}" class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22"
                                                            style="font-size: 12px;">{{ app()->getLocale() == 'id' ? 'Baca Selengkapnya' : 'Read More' }}<i
                                                                class="icon icon-right-arrow ml-10"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <i class="fa fa-map-marked-alt" style="font-size: 3em; color: #fd8d14;"></i>
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