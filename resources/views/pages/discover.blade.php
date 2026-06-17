@extends('pages.template')
@section('title', __('Tokabe.id - Discover Location'))
@section('content')

<style>
/* Card Consistency Styling */
.card-item {
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 550px;
}

.card-item .card-img {
    height: 250px;
    overflow: hidden;
}

.card-item .card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-item .card-body {
    display: flex;
    flex-direction: column;
    flex: 1;
    position: relative;
}

.card-item .description-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 81px;
    max-height: 81px;
}

.card-item .about-video-banner-btn {
    margin-top: auto;
}

/* Ensure all cards in a row have the same height */
.latest-blog-card-part .row {
    display: flex;
    flex-wrap: wrap;
}

.latest-blog-card-part .row > [class*='col-'] {
    display: flex;
}

/* Pagination Styling */
.pagination-wrapper {
    margin-top: 2rem;
}

.btn-pagination {
    background-color: #EBD136;
    color: #000;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-family: "Poppins", sans-serif;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-pagination:hover {
    background-color: #d4bc2f;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(235, 209, 54, 0.4);
    color: #000;
}

.pagination-info {
    padding: 0.75rem 1.5rem;
    background-color: #f5f5f5;
    border-radius: 8px;
    color: #333;
}
</style>

<div class="cba_demo_one">
    <div class="section-wrapper ps-rel" data-scroll-section>
        <x-navbar />

        @php
            $items = collect([
                ['text' => 'Home', 'link' => route('home')],
                ['text' => 'Discover', 'link' => route('discover')],
            ]);

            $countOoh = $lokasiOoh->count();
            $countDooh = $lokasiDooh->count();
            $breadcrumbTitle = "{$countOoh} OOH & {$countDooh} DOOH";
        @endphp

        {{-- 🔹 Breadcrumb --}}
        <x-hero-breadcrumb :items="$items" :breadcrumbTitle="$breadcrumbTitle"/>

        {{-- ========================================================= --}}
        {{-- 🔹 HEADER & SEARCH BAR --}}
        {{-- ========================================================= --}}
        <div class="container container-1290">
            <div class="mt-80">
                {{-- Header --}}
                <div class="latest-blog-header">
                    <div class="row g-45" data-aos="fade-down" data-aos-duration="2000">
                        <div class="col-12 col-lg-6">
                            <h2 class="cb-ff cb-fs-60 cb-fw-700 cb-color-black mt-20">
                                @if($countDooh > 0 && $countOoh > 0)
                                    {{ __('Discover Our DOOH & OOH Locations') }}
                                @elseif($countDooh > 0)
                                    {{ __('Discover Our DOOH Locations') }}
                                @else
                                    {{ __('Discover Our OOH Locations') }}
                                @endif
                            </h2>
                        </div>
                        <div class="col-12 col-lg-6 mt-15" data-aos="fade-up" data-aos-duration="2000">
                            <p class="cb-ff cb-fs-18 cb-fw-400">
                                @if($countDooh > 0 && $countOoh > 0)
                                    {{ __('Explore our digital and static outdoor advertising locations across provinces to reach audiences with dynamic and engaging visual advertising.') }}
                                @elseif($countDooh > 0)
                                    {{ __('Explore digital out-of-home (DOOH) screens across provinces to reach audiences with dynamic and engaging visual advertising.') }}
                                @else
                                    {{ __('Explore our static outdoor advertising locations (OOH) by province to boost your brand visibility across Indonesia.') }}
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Search Bar --}}
                    <form method="GET" action="{{ route('discover') }}" class="mb-5 mt-5">
                        <h2 class="cb-ff cb-fs-36 cb-fw-600 mb-4 text-center">{{ __('Search Strategic Location') }}</h2>
                        <div class="d-flex justify-content-center align-items-center gap-3">
                            <select name="type" class="form-select cb-ff" style="width: 150px; padding: 10px; border-radius: 8px;">
                                <option value="" {{ !request('type') ? 'selected' : '' }}>{{ __('All') }}</option>
                                <option value="DOOH" {{ request('type') === 'DOOH' ? 'selected' : '' }}>DOOH</option>
                                <option value="OOH" {{ request('type') === 'OOH' ? 'selected' : '' }}>OOH</option>
                            </select>
                            <input type="text" name="s" class="form-control cb-ff" style="width: 400px; padding: 10px; border-radius: 8px;"
                                placeholder="{{ __('Search Strategic Location') }}" value="{{ request('s') }}" />
                            <button type="submit" class="btn btn-primary cb-ff" style="padding: 10px 20px; border-radius: 8px; cursor: pointer; white-space: nowrap;">{{ __('Search') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- 🔹 BAGIAN DOOH --}}
        {{-- ========================================================= --}}
        @if($countDooh > 0)
        <div class="container container-1290">
            <div class="mt-40">
                {{-- Card list DOOH --}}
                <div class="latest-blog-card-part mb-70">
                    <div class="row">
                        @foreach ($lokasiDooh as $loc)
                            <div class="col-12 col-lg-4 mb-3" data-aos="fade-down" data-aos-duration="2000">
                                <div class="card-item cb-br-20 overflow-hidden shadow-sm">
                                    <div class="card-img imghover img-effect">
                                        <figure>
                                            <img src="{{ asset('storage/' . $loc->formattedGambar) }}" 
                                             alt="{{ \App\Helpers\SeoHelper::getImageAlt('dooh', $loc->nama, $loc->provinsi ?? 'Medan') }}" 
                                             loading="lazy">
                                        </figure>
                                    </div>

                                    <div class="card-body p-4 mt-30 ps-rel">
                                        <div class="hm1-calender cb-bg-color-black p-2 cb-br-50 ps-abs">
                                            <i class="icon icon-location cb-color-brown mr-15 pl-10"></i>
                                            <span class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 text-capitalize pr-10 cb-color-white">
                                                {{ $loc->provinsi }}
                                            </span>
                                        </div>

                                        <h2 class="cb-ff cb-fs-24 cb-fw-600 cb-color-black mt-20">@php $__nd = $loc->nama; echo is_array($__nd) ? ($__nd[app()->getLocale()] ?? $__nd['id'] ?? $__nd['en'] ?? '') : $__nd; @endphp</h2>
                                        <p class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 cb-color-gray300 mt-40 description-clamp mb-4">
                                            @php $__dd = $loc->deskripsi_lokasi; echo is_array($__dd) ? ($__dd[app()->getLocale()] ?? $__dd['id'] ?? $__dd['en'] ?? '') : $__dd; @endphp
                                        </p>

                                        <div class="about-video-banner-btn cmn-btn cb-br-50 center mt-45 cb-bg-color-brown btn-effect">
                                            <a class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22 text-capitalize"
                                               href="{{ route('showlokasidooh', $loc->nama) }}">
                                                {{ __('Read More') }}<i class="icon icon-right-arrow ml-15"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Pagination DOOH --}}
                @if(isset($totalPagesDooh) && $totalPagesDooh > 1)
                <div class="pagination-wrapper text-center mb-5">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        @if($page > 1)
                        <a href="{{ route('discover', array_merge(request()->query(), ['page' => $page - 1])) }}" 
                           class="btn btn-pagination cb-ff">
                            <i class="icon icon-left-arrow mr-2"></i> {{ __('Previous') }}
                        </a>
                        @endif
                        
                        <span class="pagination-info cb-ff cb-fs-18 cb-fw-500">
                            {{ __('Page') }} {{ $page }} {{ __('of') }} {{ $totalPagesDooh }}
                        </span>
                        
                        @if($page < $totalPagesDooh)
                        <a href="{{ route('discover', array_merge(request()->query(), ['page' => $page + 1])) }}" 
                           class="btn btn-pagination cb-ff">
                            {{ __('Next') }} <i class="icon icon-right-arrow ml-2"></i>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        {{-- ========================================================= --}}
        {{-- 🔹 BAGIAN OOH --}}
        {{-- ========================================================= --}}
        @if($countOoh > 0)
        <div class="container container-1290">
            <div class="{{ $countDooh > 0 ? 'mt-40' : 'mt-40' }}">
                {{-- Card list OOH --}}
                <div class="latest-blog-card-part mb-70">
                    <div class="row">
                        @foreach ($lokasiOoh as $loc)
                            <div class="col-12 col-lg-4 mb-3" data-aos="fade-down" data-aos-duration="2000">
                                <div class="card-item cb-br-20 overflow-hidden shadow-sm">
                                    <div class="card-img imghover img-effect">
                                        <figure>
                                            <img src="{{ asset('storage/image_lokasiooh/' . $loc->gambar) }}" 
                                             alt="{{ \App\Helpers\SeoHelper::getImageAlt('ooh', $loc->nama, $loc->wilayah ?? 'Medan') }}" 
                                             loading="lazy">
                                        </figure>
                                    </div>

                                    <div class="card-body p-4 mt-30 ps-rel">
                                        <div class="hm1-calender cb-bg-color-black p-2 cb-br-50 ps-abs">
                                            <i class="icon icon-location cb-color-brown mr-15 pl-10"></i>
                                            <span class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 text-capitalize pr-10 cb-color-white">
                                                {{ $loc->wilayah }}
                                            </span>
                                        </div>

                                        <h2 class="cb-ff cb-fs-24 cb-fw-600 cb-color-black mt-20">@php $__nn = $loc->nama; echo is_array($__nn) ? ($__nn[app()->getLocale()] ?? $__nn['id'] ?? $__nn['en'] ?? '') : $__nn; @endphp</h2>
                                        <p class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 cb-color-gray300 mt-40 description-clamp mb-4">
                                            @php $__ddd = $loc->deskripsi_lokasi; echo is_array($__ddd) ? ($__ddd[app()->getLocale()] ?? $__ddd['id'] ?? $__ddd['en'] ?? '') : $__ddd; @endphp
                                        </p>

                                        <div class="about-video-banner-btn cmn-btn cb-br-50 center mt-45 cb-bg-color-brown btn-effect">
                                            <a class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22 text-capitalize"
                                               href="{{ route('showlokasiooh', $loc->id) }}">
                                                {{ __('Read More') }}<i class="icon icon-right-arrow ml-15"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Pagination OOH --}}
                @if(isset($totalPagesOoh) && $totalPagesOoh > 1)
                <div class="pagination-wrapper text-center mb-5">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        @if($page > 1)
                        <a href="{{ route('discover', array_merge(request()->query(), ['page' => $page - 1])) }}" 
                           class="btn btn-pagination cb-ff">
                            <i class="icon icon-left-arrow mr-2"></i> {{ __('Previous') }}
                        </a>
                        @endif
                        
                        <span class="pagination-info cb-ff cb-fs-18 cb-fw-500">
                            {{ __('Page') }} {{ $page }} {{ __('of') }} {{ $totalPagesOoh }}
                        </span>
                        
                        @if($page < $totalPagesOoh)
                        <a href="{{ route('discover', array_merge(request()->query(), ['page' => $page + 1])) }}" 
                           class="btn btn-pagination cb-ff">
                            {{ __('Next') }} <i class="icon icon-right-arrow ml-2"></i>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        {{-- No Results Message --}}
        @if($countDooh == 0 && $countOoh == 0 && (request('s') || request('type')))
        <div class="container container-1290">
            <div class="mt-40 mb-70 text-center">
                <p class="cb-ff cb-fs-24 cb-fw-400 cb-color-gray300">
                    No locations found matching your search criteria.
                </p>
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Notification Popup --}}
@if(isset($notificationMessage) && $notificationMessage)
<div id="notificationPopup" class="notification-popup">
    <div class="notification-content">
        <div class="notification-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
        </div>
        <h3 class="notification-title">Location Not Available</h3>
        <p class="notification-message">{{ $notificationMessage }}</p>
        <button onclick="closeNotification()" class="notification-close-btn">OK</button>
    </div>
</div>
@endif

<style>
.notification-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    animation: fadeIn 0.3s ease-in-out;
}

.notification-content {
    background-color: white;
    padding: 2rem;
    border-radius: 16px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    animation: slideUp 0.3s ease-in-out;
}

.notification-icon {
    color: #ff9800;
    margin-bottom: 1rem;
}

.notification-title {
    font-family: "Poppins", sans-serif;
    font-size: 1.5rem;
    font-weight: 600;
    color: #1D1D3E;
    margin-bottom: 0.5rem;
}

.notification-message {
    font-family: "Poppins", sans-serif;
    font-size: 1rem;
    color: #666;
    margin-bottom: 1.5rem;
}

.notification-close-btn {
    background-color: #EBD136;
    color: #000;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-family: "Poppins", sans-serif;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.notification-close-btn:hover {
    background-color: #d4bc2f;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(235, 209, 54, 0.4);
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        transform: translateY(50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>

<script>
function closeNotification() {
    const popup = document.getElementById('notificationPopup');
    if (popup) {
        popup.style.animation = 'fadeOut 0.3s ease-in-out';
        setTimeout(() => {
            popup.remove();
        }, 300);
    }
}

// Close popup when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('notificationPopup');
    if (popup) {
        popup.addEventListener('click', function(e) {
            if (e.target === popup) {
                closeNotification();
            }
        });
    }
});
</script>
@endsection
