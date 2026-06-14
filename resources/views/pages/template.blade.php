<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start': new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PLCTPGGZ');
  </script>
  
  <title>@yield('title', __('Tokabe.id - Advertising Agency Solutions in Medan, Sumatera'))</title>
  
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="google-site-verification" content="ScJJZdwuHbybF21IizF9_OpYJxgfFHnGED5LGduCEeU" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google" content="notranslate">

  <meta name="description" content="Tokabe.id Videotron DOOH , OOH , Event Organizer , Brand Activity , Sponsor Agency , PhotoVideoGraphy " />
  <meta name="keywords" content="Harga sewa videotron Medan , Sewa billboard strategis Medan , Sewa billboard Medan , Vendor reklame Sumatera , Jasa pasang billboard profesional , Biaya iklan videotron outdoor , Vendor OOH Indonesia , Digital Out of Home DOOH Medan ,OOH marketing agency Sumatera , Media buying agency OOH , Vendor videotron perusahaan , Jasa periklanan luar ruang nasional , Jasa iklan korporat B2B , Branding agency OOH , Harga pasang reklame besar , Sewa LED screen outdoor , Billboard premium Medan , Sewa billboard Pekanbaru , Sewa billboard Palembang , Sewa billboard Banda Aceh , Sewa billboard Lampung , Sewa billboard Padang , Konstruksi reklame billboard Medan , Vendor LED screen Sumatera , Event organizer korporat Medan, Brand activation agency Sumatera, Jasa event management profesional, Penyelenggara acara B2B Medan, Corporate event planner Indonesia, Agensi brand activation Jakarta Medan, Vendor pameran dan event Sumatera, Jasa eksekusi event promosi, Vendor produksi event Sumatera, Sewa LED screen panggung Medan, Jasa promosi event outdoor, Konstruksi booth pameran Medan, Vendor perlengkapan event Sumatera, Media partner promosi acara, Vendor advertising event B2B, Jasa pasang baliho event konser, Sponsor agency brand activity, Jasa manajemen kampanye iklan, Agensi promosi produk baru, Vendor eksekusi marketing OOH, Jasa branding event perusahaan, Solusi promosi event skala besar, Offline marketing agency Sumatera, Local partner event Medan, Local support event Sumatera, Mitra event organizer Medan, Vendor lokal event Sumatera, Jasa local partner B2B Medan, Partner eksekusi event daerah, Agensi partner lokal Sumatera, Vendor pelaksana event lokal, Ground handling event Medan, Tim eksekusi event Sumatera, Vendor produksi event lokal, Jasa pengurusan izin event Medan, Manajemen operasional event lokal, Vendor logistik dan rigging Medan, Jasa pasang materi promo event, Pemasok kebutuhan event Sumatera, Local partner brand activation, Vendor support roadshow Medan, Mitra promosi brand Sumatera, Jasa eksekusi campaign lokal, Partner event promosi B2B, Tim lapangan aktivasi brand Medan, Vendor pendukung konser Sumatera "/>

  <meta property="og:title" content="Tokabe.id - Videotron DOOH, OOH, Event Organizer, Brand Activity, Sponsor Agency , PhotoVideoGraphy" />
  <meta property="og:description" content="The Promotion Must Go On." />
  <meta property="og:image" content="{{ asset('images/LogoTKB.jpg') }}" />
  <meta property="og:type" content="website" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="preconnect" crossorigin>
  <link rel="icon" type="image/jpeg" href="{{ asset('images/LogoTKB.jpg') }}?v=2">
  <link rel="shortcut icon" type="image/jpeg" href="{{ asset('images/LogoTKB.jpg') }}?v=2">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('web_assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/fonts/iconly.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/css/lity.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/css/swiper-bundle.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/css/odometer-theme-default.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('web_assets/css/responsive.css') }}">
  
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- jQuery & SweetAlert -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  @yield('head')
</head>

<body>

  @yield('content')

  <!-- Footer diletakkan di dalam tag body -->
  <x-footer/>

  <!-- Scripts -->
  <script src="{{ asset('web_assets/js/jquery.js') }}"></script>
  <script src="{{ asset('web_assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('web_assets/js/lity.min.js') }}"></script>
  <script src="{{ asset('web_assets/js/gsap.min.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/locomotive-scroll.min.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/SplitText.min.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/marquee.min.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/swiper-bundle.min.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/appear.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/odometer.min.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/script.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/allScript.js') }}" defer></script>
  <script src="{{ asset('web_assets/js/main.js') }}" defer></script>
  
  <!-- AOS JS diletakkan tanpa defer agar bisa langsung di inisialisasi -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <script>
    // Memastikan seluruh HTML dimuat sebelum AOS dijalankan
    document.addEventListener("DOMContentLoaded", function() {
        AOS.init({
            once: true,      // Animasi dimainkan sekali saja
            offset: 50,      // Trigger jarak scroll
            duration: 800,   // Durasi animasi standar
            easing: 'ease-in-out' // Transisi animasi
        });
    });
  </script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Mencegah klik kanan khusus pada gambar dan video
        document.addEventListener('contextmenu', function(e) {
            if (e.target.tagName === 'IMG' || e.target.tagName === 'VIDEO') {
                e.preventDefault();
            }
        }, false);

        // 2. Otomatis menyembunyikan tombol download di semua video
        const semuaVideo = document.querySelectorAll('video');
        semuaVideo.forEach(video => {
            video.setAttribute('controlsList', 'nodownload');
        });
    });
  </script>
  
  @yield('plugin')
</body>

</html>