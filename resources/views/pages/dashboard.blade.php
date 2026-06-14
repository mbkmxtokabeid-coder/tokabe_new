@extends('pages.template')
@section('content')


<div class="cba_demo_one" style="overflow-x: hidden;">
    <!-- Header Start -->
    <x-home-navbar :hero="$hero" />
    <!-- Header End -->

        <div class="container-fluid cb-bg-color-gray-200 z-index-5">
            <!-- features-part-start -->
            <div class="container contaner-1290 pt-60">
                <div class="features-part ps-rel" id="services">
                    <div class="features-header-part text-center">
                        <h2 class="cb-ff cb-fs-60 cb-fw-400 cb-color-black mb-30" data-aos="fade-up" data-aos-duration="2000">
                            {{ __('web.supercharge_title') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- service-section END -->
        <div class="container container-1290 mt-130">
            <div class="service-part">
                <div class="row">
                    @foreach ($service as $item)
                        <div class="col-12 col-lg-6 mt-10" data-aos="flip-left" data-aos-duration="3000">
                            <div class="features-card">
                                <div class="features-card__content">
                                    <div class="features-card__main">
                                        <div class="features-card__text">
                                            <h5 class="features-card__title ">{{ app()->getLocale() == 'id' && !empty($item->title_id) ? $item->title_id : $item->judul }}</h5>
                                            <p class="features-card__description">
                                                {!! app()->getLocale() == 'id' && !empty($item->description_id) ? $item->description_id : $item->formattedService !!}
                                            </p>
                                        </div>
                                        <div class="features-card__aside">
                                            <div class="features-card__icon">
                                                <i class="{{ $item->ikon }}"></i>
                                            </div>
                                            <div class="features-button">
                                                <div class="btn-effect cb-bg-color-brown mb-25"
                                                    style="width: 120px; height: 30px;">
                                                    <a href="{{ route('show', ['id' => $item->id]) }}"
                                                        data-hover="{{ __('web.read_more') }}" class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22"
                                                        style="white-space: nowrap; width: fit-content; height: auto; padding: 10px 20px; font-size: 12px;">{{ __('web.read_more') }}<i
                                                            class="icon icon-right-arrow ml-10"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- service-section END -->
        <!-- video-banner-part-start ASTRONOT -->
        <!--<div class="container container-1290 mt-60">-->
        <!--    <div class="video-banner center cb-br-20" data-aos="fade-down" data-aos-duration="2000">-->
        <!--        <img src="/images/astronot.gif" alt="Description of GIF" class="gif-class"-->
        <!--            style="width: 100%; height: auto;">-->
        <!--    </div>-->
        <!--</div>-->
        <!-- video-banner-part-end -->


        <!-- latest-gallery-part-start -->
        <div class="container contaner-1290">
            <div class="latest-part pt-80">
                <div class="row">
                    <div class="col-12 col-lg-6" data-aos="fade-left" data-aos-duration="2000">
                        <h2 class="cb-ff cb-fs-70 cb-fw-400 cb-color-black text-capitalize mt-20 latest-h2">{{ __('web.locations_title') }}</h2>
                    </div>
                    <div class="col-12 col-lg-6" data-aos="fade-right" data-aos-duration="2000">
                        <!-- latest-counter-part -->
                        <div class="latest-counter-part">
                            <div class="row counter">
                                @foreach ($productCount as $count)
                                    <div
                                        class="col-12 col-md-5 mb-5 mb-lg-0 col-lg-5 counter-item cb-br-10 mr-30 d-flex align-items-center justify-content-center">
                                        <div class="d-flex align-items-center">
                                            <h2 class="cb-ff cb-fs-65 cb-fw-700 "><span class="odometer"
                                                    data-count="{{ $count['count'] }}">00</span></h2>
                                        </div>
                                        <p class="cb-ff cb-fs-18 cb-fw-400 cb-color-black">{{ $count['product'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- billbord-part-end -->
   <!-- PETA SUMATERA START -->
<div class="container container-1290 mt-100">
  <div class="text-center mb-40" data-aos="fade-up" data-aos-duration="2000">
    <h2 class="cb-ff cb-fs-60 cb-fw-700 cb-color-black">{{ __('Sumatra Map') }}</h2>
    <p class="cb-ff cb-fs-18 cb-fw-400 cb-color-gray300">
     {{ __('Click on a province to view OOH/DOOH data (sample).') }}
    </p>
  </div>

  <div class="row justify-content-center">
    <!-- Kolom Peta -->
    <div class="col-12 col-lg-7">
      <div id="mapContainer" class="cb-br-20"
           style="background:#f6fbff; padding:12px; border-radius:12px; height:400px;
                  box-shadow:0 6px 20px rgba(0,0,0,0.1);">
        <svg id="sumatraSvg" width="100%" height="100%"
             style="display:block; border-radius:12px;"></svg>
      </div>
    </div>

    <!-- Kolom Panel -->
    <div class="col-12 col-lg-5 mt-4 mt-lg-0">
      <aside id="mapInfo" class="info-panel cb-br-20"
             style="background:#fff; padding:20px; border-radius:12px; height:400px; overflow-y:auto;
                    box-shadow:0 6px 20px rgba(0,0,0,0.1);">
        <div id="mapInfoContent" class="cb-ff" style="font-size:14px;">
          <div class="info-title cb-fw-700 cb-fs-20">{{ __('Select a province on the map') }}</div>
          <div class="info-muted cb-color-gray300 mt-2">
            {{ __('OOH/DOOH information will be displayed here') }}
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

<style>
  /* === RESPONSIVE MAP SUMATERA === */
  #mapContainer {
    background: #f6fbff;
    padding: 12px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    width: 100%;
    aspect-ratio: 16 / 10;
    max-height: 500px;
  }

  #sumatraSvg {
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 12px;
  }

  @media (max-width: 768px) {
    .row.justify-content-center {
      flex-direction: column !important;
      align-items: center;
    }

    #mapContainer {
      aspect-ratio: 4 / 3;
      margin-bottom: 20px;
      max-height: unset;
    }

    #mapInfo {
      height: auto !important;
      width: 100% !important;
    }

    .info-panel {
      font-size: 14px;
    }
  }
</style>

<!-- ================= POPUP CSS ================= -->
<style>
/* ===== POPUP FIX ===== */
.popup-overlay{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,.55);
  display:none;
  justify-content:center;
  align-items:center;
  z-index:999999;
}

.popup-modal{
  position:relative;
  width:720px;
  max-width:94%;
  background:transparent;
  animation:popupIn .4s ease;
}

.popup-modal img{
  width:100%;
  display:block;
  border-radius:14px;
}

/* ===== CLOSE BUTTON ===== */
.popup-close{
  position:absolute;
  top:-14px;
  right:-14px;
  width:34px;
  height:34px;
  border:none;
  border-radius:50%;
  background:#000;
  color:#fff;
  font-size:22px;
  cursor:pointer;
  z-index:10;
}

/* ===== GLOW + PULSE ===== */
.glow-pulse{
  animation:pulse 2s infinite;
  box-shadow:0 0 30px rgba(255,200,0,.6);
}

@keyframes pulse{
  0%{box-shadow:0 0 25px rgba(255,200,0,.6)}
  50%{box-shadow:0 0 45px rgba(255,255,255,.9)}
  100%{box-shadow:0 0 25px rgba(255,200,0,.6)}
}

/* ===== FIREWORKS ===== */
.fireworks,
.confetti{
  position:absolute;
  inset:0;
  pointer-events:none;
  overflow:hidden;
}

.firework{
  position:absolute;
  width:6px;
  height:6px;
  border-radius:50%;
  animation:explode 1s ease-out forwards;
}

@keyframes explode{
  from{transform:translate(0,0) scale(1);opacity:1}
  to{transform:translate(var(--x),var(--y)) scale(0);opacity:0}
}

/* ===== CONFETTI ===== */
.conf{
  position:absolute;
  width:8px;
  height:14px;
  opacity:.9;
  animation:fall 3s linear forwards;
}

@keyframes fall{
  from{transform:translateY(-10px) rotate(0)}
  to{transform:translateY(100vh) rotate(360deg)}
}

/* popup anim */
@keyframes popupIn{
  from{opacity:0;transform:scale(.85) translateY(30px)}
  to{opacity:1;transform:scale(1) translateY(0)}
}


</style>

<style>
/* ===== FIREWORKS ===== */
.firework{
  position:absolute;
  width:12px;
  height:12px;
  border-radius:50%;
  background:transparent;
  pointer-events:none;
}

.fw-left{
  top:-10px;
  left:-10px;
  animation:fireworkLeft 1.6s ease-out forwards;
}

.fw-right{
  top:-10px;
  right:-10px;
  animation:fireworkRight 1.6s ease-out forwards;
}

.firework::before{
  content:"";
  position:absolute;
  inset:0;
  border-radius:50%;
  box-shadow:
    0 0 0 0 rgba(255,200,0,.9),
    0 0 0 0 rgba(255,80,80,.8),
    0 0 0 0 rgba(80,160,255,.8);
  animation:explode 1.2s ease-out forwards;
}

@keyframes explode{
  to{
    box-shadow:
      -40px -30px 0 0 rgba(255,200,0,0),
       40px -20px 0 0 rgba(255,80,80,0),
      -20px  40px 0 0 rgba(80,160,255,0),
       30px  30px 0 0 rgba(255,255,255,0);
  }
}

@keyframes fireworkLeft{
  from{transform:scale(.2)}
  to{transform:scale(1)}
}

@keyframes fireworkRight{
  from{transform:scale(.2)}
  to{transform:scale(1)}
}

.glow-pulse{
  animation:glowPulse 2s ease-in-out infinite;
}

@keyframes glowPulse{
  0%{box-shadow:0 0 0 rgba(255,200,0,0)}
  50%{box-shadow:0 0 30px rgba(255,200,0,.6)}
  100%{box-shadow:0 0 0 rgba(255,200,0,0)}
}

</style>






<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
(async function() {
  const geoJsonUrl = '/geojson/id.json';
  const apiUrl = '/api/map-data';

  const sumatraProvNames = [
    'Aceh','Sumatera Utara','Sumatera Barat','Riau','Kepulauan Riau',
    'Jambi','Bengkulu','Sumatera Selatan','Bangka Belitung','Lampung','Bangka-Belitung',
  ];

  // === Setup dasar SVG & D3 ===
  const svg = d3.select('#sumatraSvg');
  const g = svg.append('g');
  const projection = d3.geoMercator();
  const pathGen = d3.geoPath().projection(projection);
  let fc = null; // simpan data geojson global

  // === Fungsi tampil info ===
  function showInfo(props, data) {
    const name = props.NAME_1 || props.name || props.provinsi || '�';
    const found = data.find(item =>
      item.provinsi && name.toLowerCase().includes(item.provinsi.toLowerCase())
    );

    const billboards = found ? found.billboards : 0;
    const videotron = found ? found.videotron : 0;
    const allLocations = [
      ...(found?.lokasi_ooh || []),
      ...(found?.lokasi_videotron || [])
    ];

    const topLocations =
      allLocations.length > 0
        ? allLocations.sort(() => 0.5 - Math.random()).slice(0, 3)
        : ['Location data is currently unavailable'];

    document.getElementById('mapInfoContent').innerHTML = `
      <div class="cb-ff" style="font-size:15px; line-height:1.6;">
        <div class="cb-fw-700 cb-fs-20">${name}</div>
        <div class="cb-color-gray300 mt-2">OOH/DOOH Information</div>
        <div class="mt-3 border-top pt-2">
          <div class="d-flex justify-content-between">
            <span>Billboard</span><strong>${billboards}</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span>Videotron</span><strong>${videotron}</strong>
          </div>
          <div class="mt-3">
            <strong>Top Locations</strong>
            <ul style="margin:6px 0 0 0; padding-left:0;">
              ${topLocations.map(l => `
                <li style="margin-bottom:6px; list-style:none; position:relative; padding-left:16px; line-height:1.5;">
                  <span style="position:absolute; left:0; top:50%; transform:translateY(-50%);
                    width:6px; height:6px; background:#0f62fe; border-radius:50%;"></span>
                  ${l}
                </li>`).join('')}
            </ul>
          </div>
          <a href="/discover?region=${encodeURIComponent(name)}"
             class="btn btn-sm btn-primary mt-4 cb-br-10">Discover More</a>
        </div>
      </div>`;
  }

  // === Ambil data dari API & GeoJSON ===
  const [apiData, geojson] = await Promise.all([
    fetch(apiUrl).then(r => r.json()),
    d3.json(geoJsonUrl)
  ]);

  const features = (geojson.features || []).filter(f => {
    const n = (f.properties.NAME_1 || f.properties.name || f.properties.provinsi || '').toString();
    return sumatraProvNames.some(s => n.toLowerCase().includes(s.toLowerCase()));
  });

  fc = { type: 'FeatureCollection', features };

  // === Fungsi renderMap (responsive) ===
  function renderMap() {
    if (!fc) return;
    const width = svg.node().getBoundingClientRect().width;
    const height = svg.node().getBoundingClientRect().height;
    projection.fitSize([width, height], fc);
    g.selectAll('path').attr('d', pathGen);
  }

  // === Gambar peta ===
  g.selectAll('path')
    .data(fc.features)
    .enter()
    .append('path')
    .attr('fill', '#cfe2ff')
    .attr('stroke', '#6c8cd5')
    .attr('stroke-width', 0.8)
    .style('cursor', 'pointer')
    .on('mouseenter', function() {
      d3.select(this).attr('fill', '#99c2ff');
    })
    .on('mouseleave', function() {
      d3.select(this).attr('fill', '#cfe2ff');
    })
    .on('click', function(event, d) {
      g.selectAll('path')
        .attr('stroke', '#6c8cd5')
        .attr('stroke-width', 0.8)
        .attr('fill', '#cfe2ff');
      d3.select(this)
        .attr('stroke', '#053e9b')
        .attr('stroke-width', 1.5)
        .attr('fill', '#0f62fe');
      showInfo(d.properties, apiData);
    });

  // === Render pertama ===
  setTimeout(renderMap, 300);

  // === Update otomatis kalau layar berubah ===
  window.addEventListener('resize', renderMap);
  window.addEventListener('orientationchange', renderMap);

  // === Deteksi perubahan ukuran kontainer ===
  const observer = new ResizeObserver(() => renderMap());
  observer.observe(document.getElementById('mapContainer'));
})();
</script>





        <!-- LOKASI DOOH START -->
        <x-discover-billboard :lokasi="$lokasi" />
        <!-- LOKASI DOOH END -->

        <!-- LOKASI OOH START -->
        <div class="container container-1290">
            <div class="mt-50">
                <div class="latest-blog-header">
                    <div class="row g-45 ooh-container-title" data-aos="fade-down" data-aos-duration="2000">
                        <div class="col-12 col-lg-6">
                            <h2 class="cb-ff cb-fs-60 cb-fw-700 cb-color-black mt-20">{{ __('Discover Our OOH Sites') }}</h2>
                        </div>
                        <div class="col-12 col-lg-6 mt-15" data-aos="fade-up" data-aos-duration="2000">
                            <p class="cb-ff cb-fs-18 cb-fw-400">{{ __('web.ooh_description') }}</p>
                        </div>
                    </div>
                </div>
                <div class="latest-blog-card-part mt-40 mb-70">
                    <div class="row">
                        @foreach ($lokasiooh as $loc)
                            <div class="col-12 col-lg-4 mb-3" data-aos="fade-down" data-aos-duration="2000">
                                <div class="card-item cb-br-20 overflow-hidden"
                                    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                    <div class="card-img imghover img-effect" style="max-height: 250px;">
                                        <figure><img src="{{ asset('storage/image_lokasiooh/' . $loc->gambar) }}"
                                                alt="business-banner" style="object-fit: cover;">
                                        </figure>
                                    </div>
                                    <div class="card-body p-4 mt-30 ps-rel">
                                        <div class="hm1-calender cb-bg-color-black p-2 cb-br-50 ps-abs">
                                            <i class="icon icon-location cb-color-brown mr-15 pl-10"></i>
                                            <span
                                                class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 text-capitalize pr-10 cb-color-white">{{ $loc->wilayah }}</span>
                                        </div>
                                        <h2 class="cb-ff cb-fs-24 cb-fw-600 cb-color-black mt-20">{{ $loc->nama }} </h2>
                                        <p
                                            class="cb-ff cb-fs-18 cb-fw-400 cb-lh-27 cb-color-gray300 mt-40 description-clamp mb-4">
                                            {!! $loc->formattedLokasiooh !!}</p>
                                        <div
                                            class="about-video-banner-btn cmn-btn cb-br-50 center mt-45 cb-bg-color-brown btn-effect">
                                             @php
                                            $route = 'showlokasiooh';
                                            @endphp
                                            <a class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22 text-capitalize"
                                                href="{{ route($route, $loc->id) }}">Read
                                                More<i class="icon icon-right-arrow ml-15"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- LOKASI OOH END -->
        
        <!-- Brand Activity Start -->
        <div class="container contaner-1290 pt-60">
            <div class="features-part ps-rel">
                <div class="features-header-part text-center">
                    <h2 class="cb-ff cb-fw-600 cb-color-black mb-30" data-aos="fade-up" data-aos-duration="2000">
                        {{ __('Our Brand Activities') }}</h2>
                    <h2 class="cb-ff cb-fs-60 cb-fw-400 cb-color-black mb-30" data-aos="fade-up" data-aos-duration="2000">
                        {{ __('web.show_must_go_on') }}</h2>
                </div>
                <div class="features-billboard-add-part">
                    <div class="row">
                        @foreach($brand as $index => $item)
                        <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                             <a href="{{ route('brand', ['tab' => $index]) }}" class="text-decoration-none">
                            <div class="features-billboard-card-body" data-aos="fade-up" data-aos-duration="2000">
                                <div class="features-billboard-card-image img-effect imghover">
                                    <figure><img class="cb-br-10" src="{{ asset('storage/image_brand/'. $item->gambar) }}" alt="{{ $item->judul }}"
                                            data-aos="flip-right" data-aos-duration="2000"></figure>
                                </div>
                                <div class="features-billboard-card-content mt-20">
                                    <h3 class="cb-ff cb-fw-600 cb-fs-24 cb-color-black text-center">{{ $item->judul }}</h3>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Activity Start end -->
        
        <!-- Photography Start -->
        <div class="container contaner-1290 pt-60">
            <div class="features-part ps-rel">
                <div class="features-header-part text-center">
                    <h2 class="cb-ff cb-fw-600 cb-color-black mb-30" data-aos="fade-up" data-aos-duration="2000">
                        {{ __('Our Photography & Videography') }}</h2>
                    <h2 class="cb-ff cb-fs-60 cb-fw-400 cb-color-black mb-30" data-aos="fade-up" data-aos-duration="2000">
                        {{ __('web.capturing_moments') }}</h2>
                </div>
                <div class="features-billboard-add-part">
                    <div class="row">
                        @foreach($photo as $item)
                        <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                            <a href="{{route('showPhoto')}}" class="text-decoration-none">
                            <div class="features-billboard-card-body" data-aos="fade-up" data-aos-duration="2000">
                                <div class="features-billboard-card-image img-effect imghover">
                                    <figure><img class="cb-br-10" src="{{ asset('storage/image_photography/'. $item->image_url) }}" alt="{{ $item->title }}"
                                            data-aos="flip-right" data-aos-duration="2000"></figure>
                                </div>
                                <div class="features-billboard-card-content mt-20">
                                    <h3 class="cb-ff cb-fw-600 cb-fs-24 cb-color-black text-center">{{ $item->title }}</h3>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Photography end -->

        @if (count($partners) > 0)
    <!-- Section Container: Menggunakan padding atas-bawah (py) agar jarak konsisten -->
    <section class="w-full bg-white py-16 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Judul: Dibuat rapi menggunakan pure Tailwind tanpa inline CSS -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                    {{ __('Our Partners') }}
                </h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4 rounded-full"></div> <!-- Garis pemanis (Opsional) -->
            </div>

            <!-- Slider Baris Pertama (Atas) -->
            @if($partners->where('posisi', 'Atas')->count() > 0)
                <div class="swiper nl__brand-logo-items mb-8">
                    <div class="swiper-wrapper items-center">
                        @foreach ($partners->where('posisi', 'Atas') as $partner)
                            <div class="swiper-slide !flex justify-center items-center py-4">
                                <!-- Kotak/Card untuk Logo: Ditambahkan flex-none agar ukurannya mutlak persegi -->
                                <div class="w-[120px] h-[120px] sm:w-[160px] sm:h-[160px] flex-none bg-white rounded-2xl shadow-sm border border-gray-100 flex justify-center items-center p-4 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                                    <!-- Image: w-full h-full memastikan gambar tunduk pada ukuran kotak putih -->
                                    <img 
                                        src="{{ asset('storage/image_partner/' . $partner->gambar) }}" 
                                        alt="Logo partner {{ $partner->nama_partner }} - Tokabe.id" 
                                        class="w-full h-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300" 
                                        loading="lazy"
                                    >
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Slider Baris Kedua (Bawah) -->
            @if($partners->where('posisi', 'Bawah')->count() > 0)
                <div class="swiper nl__brand-logo-items-reverse">
                    <div class="swiper-wrapper items-center">
                        @foreach ($partners->where('posisi', 'Bawah') as $partner)
                            <div class="swiper-slide !flex justify-center items-center py-4">
                                <!-- Kotak/Card untuk Logo: Ditambahkan flex-none agar ukurannya mutlak persegi -->
                                <div class="w-[120px] h-[120px] sm:w-[160px] sm:h-[160px] flex-none bg-white rounded-2xl shadow-sm border border-gray-100 flex justify-center items-center p-4 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                                    <!-- Image: w-full h-full memastikan gambar tunduk pada ukuran kotak putih -->
                                    <img 
                                        src="{{ asset('storage/image_partner/' . $partner->gambar) }}" 
                                        alt="Logo partner {{ $partner->nama_partner }} - Tokabe.id" 
                                        class="w-full h-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300" 
                                        loading="lazy"
                                    >
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
@endif
    </div>
    </div>
@endsection