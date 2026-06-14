@props(['items' => [], 'bgImage' => 'images/heading-bg.jpg', 'breadcrumbTitle' => null])

<div class="common-hero-area d-flex align-items-center" style="background-image: url({{ asset($bgImage) }});">
    <!-- Background image as img tag -->
    {{-- <img src="{{ asset('images/heading-bg.jpg') }}" alt="" 
        style="position: absolute; width: 100%; height: 100%; object-fit: cover;"> --}}
    
    <div class="container container-1290" style="position: relative;">
        <div class="hero-part">
            @if ($breadcrumbTitle)
                <h2 class="cb-ff cb-fs-48 cb-color-white">{{ $breadcrumbTitle }}</h2>
            @else
                <h2 class="cb-ff cb-fs-48 cb-color-white">{{ $items[count($items) - 1]['text'] }}</h2>
            @endif
            <div class="hero-link d-flex align-items-center">
                @for ($i = 0; $i < count($items) - 1; $i++) 
                    <a class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30 cb-color-white mr-10 {{ $i > 0 ? 'ml-10' : '' }}" href="{{ $items[$i]['link'] }}">{{ $items[$i]['text'] }}</a>
                    <i class="icon icon-lftcervhon cb-fs-12 cb-fw-600 cb-lh-16 cb-color-white"></i>
                @endfor
                <a class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30 cb-color-white ml-10" href="{{ $items[count($items) - 1]['link'] }}">{{ $items[count($items) - 1]['text'] }}</a>
            </div>
        </div>
    </div>                                                                                                                              
</div>