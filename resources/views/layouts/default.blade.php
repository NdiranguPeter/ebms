<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>EBMS</title>

	<meta name="description" content="overview &amp; stats" />
	{{-- <meta name="csrf-token" content="{{ csrf-token() }}" /> --}}
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }} " />
	<link rel="stylesheet" href="{{ asset('frontend/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
	<script src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="{{ asset('frontend/css/fonts.googleapis.com.css') }}" />

	<!-- ace styles -->
	<link rel="stylesheet" href="{{ asset('frontend/css/ace.min.css') }}" class="ace-main-stylesheet"
		id="main-ace-style" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="frontend/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	<link rel="stylesheet" href="{{ asset('frontend/css/ace-skins.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/css/ace-rtl.min.css') }}" />


	<script src="{{ asset('frontend/js/ace-extra.min.js') }}"></script>


	<style>
		.dashcard {
			color: #fff;
			border: 10px solid #fff;
			min-height: 160px;

		}

		.dashcard h6 {
			text-align: center;
			font-weight: bold;
			font-size: medium;
		}

		.dashcard i {
			/* display: list-item; */
			display: block;
			margin-top: 8%;
			/* font-size: -webkit-xxx-large; */
			font-size: xx-large;
		}

		.well {
			border: 0.5px solid #efefef;
			color: #2da0ef;
		}

		.shw b {
			color: #2da0ef;
		}

		.acts td {
			padding: 5px;
		}
	</style>

</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<img src="{{ asset('storage/images/logo.jpg') }}" alt=""
							style="max-height: 40px; margin-top: -5%;">
						EBMS
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">


					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							{{-- <img style="width:50px; height:50px; margin-top:1px;" class="nav-user-photo"
								src="{{ asset('storage/images/user.png') }}" alt="" /> --}}
							<span class="user-info">
								<small>Welcome,</small>
								{{ Auth::user()->name }}
							</span>

							{{-- <i class="ace-icon fa fa-caret-down"></i> --}}
						</a>

						<ul
							class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="#">
									<i class="ace-icon fa fa-cog"></i>
									Settings
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
															                                                     document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST"
									style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>

		<div id="sidebar" class="sidebar  responsive  ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>

			<div class="sidebar-shortcuts" id="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

				</div>

			</div><!-- /.sidebar-shortcuts -->

			@include('layouts.nav')


			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
					data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>


		@yield('content')

		@include('layouts.footer')
</body>

</html>