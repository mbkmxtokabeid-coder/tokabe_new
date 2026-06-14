<!DOCTYPE html>
<html lang="en">

<head>

	<title>Tokabe - Admin</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description"
		content="Dasho Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords"
		content="admin templates, bootstrap admin templates, bootstrap 5, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Dasho, Dasho bootstrap admin template">
	<meta name="author" content="Phoenixcoded" />

	<!-- Favicon icon -->
	<link rel="icon" href="{{asset('dashboard_assets/images/favicon.svg')}}" type="image/x-icon">
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
	<!-- animation css -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/plugins/animation/css/animate.min.css')}}">

	<!-- notification css -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/plugins/notification/css/notification.min.css')}}">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/css/style.css')}}">

	<link rel="stylesheet" href="{{asset('dashboard_assets/plugins/data-tables/css/datatables.min.css')}}">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menupos-fixed menu-dark menu-item-icon-style6 ">
		<div
			class="navbar-wrapper ">
			<div class="navbar-brand header-logo">
				<a href="/admin" class="b-brand">

					<img src="{{asset('dashboard_assets/images/logo.svg')}}" alt="logo" class="logo images">
					<img src="{{asset('dashboard_assets/images/logo-icon.svg')}}" alt="logo" class="logo-thumb images">
				</a>
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			</div>
			<div class="navbar-content scroll-div   "
				id="layout-sidenav" >
				<ul class="nav pcoded-inner-navbar sidenav-inner">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
						class="nav-item">
						<a href="/admin" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span
								class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Front-End</label>
					</li>

					<li data-username="Form Validation" class="nav-item"><a href="{{route('hero')}}" class="nav-link"><span
								class="pcoded-micon"><i class="feather icon-grid"></i></span><span class="pcoded-mtext">Heroes</span></a></li>

					<li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
						class="nav-item">
						<a href="{{ route('service-list') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-server"></i></span><span
								class="pcoded-mtext">Service</span></a>
					</li>
					<li data-username="basic components button alert badges breadcrumb pagination progress tooltip popovers carousel cards collapse tabs pills modal spinner grid system toasts typography extra shadows embeds"
						class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span
								class="pcoded-mtext">Menu</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="{{ route('lokasi-list') }}" class="">DOOH Videotron</a></li>
							<li class=""><a href="{{route('wilayah-list-ooh')}}" class="">OOH Bilboard</a></li>
							<li class=""><a href="{{ route('brand-list') }}" class="">Brand Activity</a></li>
							<li class=""><a href="{{ route('photography') }}" class="">Photography & Videography</a></li>
						</ul>
					</li>
					
					

					<li data-username="animations" class="nav-item"><a href="{{ route('partner-list') }}" class="nav-link"><span class="pcoded-micon"><i
									class="feather icon-aperture"></i></span><span class="pcoded-mtext">Partnership</span></a>
					</li>


					<li data-username="animations" class="nav-item"><a href="{{ route('pesan-admin') }}" class="nav-link"><span
								class="pcoded-micon"><i class="feather icon-message-square"></i></span><span
								class="pcoded-mtext">Pesan</span></a></li>
					<li data-username="portofolio" class="nav-item">
    <a href="{{ route('portofolio.index') }}" class="nav-link">
        <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
        <span class="pcoded-mtext">Portofolio</span>
    </a>
</li>

					
					<li class="nav-item">
					<a href="{{ route('portofolio_categories.index') }}"  class="nav-link">
					<span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
					<span class="pcoded-mtext">Kategori portofolio</span>
					</a>
				</li>
    </li>
    <!-- Selesai -->
				</ul>
			</div>
			
		</div>
	</nav>
	<!-- [ navigation menu ] end -->

	

	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
		
			<div class="m-header">
				<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
				<a href="/admin" class="b-brand">

					<img src="{{asset('dashboard_assets/images/logo.svg')}}" alt="" class="logo images">
					<img src="{{asset('dashboard_assets/images/logo-icon.svg')}}" alt="" class="logo-thumb images">
				</a>
			</div>
			<a class="mobile-menu" id="mobile-header" href="#!">
				<i class="feather icon-more-horizontal"></i>
			</a>
			<div class="collapse navbar-collapse">
				<a href="#!" class="mob-toggler"></a>
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<div class="main-search open">
							<div class="input-group">
								<input type="text" id="m-search" class="form-control" placeholder="Search . . .">
								<a href="#!" class="input-group-append search-close">
									<i class="feather icon-x input-group-text"></i>
								</a>
								<span class="ms-1 input-group-append search-btn btn btn-primary">
									<i class="feather icon-search input-group-text"></i>
								</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
			
	</header>
	<!-- [ Header ] end -->

    @yield('content')


@stack('scripts')
<!-- Required Js -->
<script src="{{asset('dashboard_assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/pcoded.min.js')}}"></script>

<!-- datatable js -->
<script src="{{asset('dashboard_assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/pages/data-basic-custom.js')}}"></script>

<!-- sweet alert Js -->
<script src="{{asset('dashboard_assets/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/pages/ac-alert.js')}}"></script>
</body>

</html>