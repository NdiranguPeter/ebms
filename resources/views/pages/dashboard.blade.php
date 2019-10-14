@extends('layouts.default')
@section('content')
<div class="container-fluid main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="list-inline">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="/home">Home</a>
				</li>
				/
				<li class="active">Dashboard</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
							autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">


			<div class="page-header">
				<h1>
					Dashboard

				</h1>
			</div><!-- /.page-header -->

			<!-- PAGE CONTENT BEGINS -->
			<div class="container-fluid">

				<div class="row">
					<a href="/surveys">
						<div class="col-md-4 dashcard " style="background-color:#428bca !important; ">
							<i class="ace-icon fa fa-folder-o "></i>
							<h6>SURVEY</h6>
						</div>
					</a>
					<a href="/projects">
						<div class="col-md-4 dashcard" style="background-color:#d15b47 !important; ">
							<i class="ace-icon fa fa-desktop"></i>
							<h6>PROJECT PROFILE</h6>
						</div>
						<a href="/meal">
							<div class="col-md-4 dashcard" style="background-color:#abbac3 !important; ">
								<i class="ace-icon fa fa-bar-chart-o "></i>

								<h6>MEAL</h6>

							</div>
						</a>

						<div class="col-md-4 dashcard" style="background-color:#87b87f !important; ">
							<i class="ace-icon fa fa-list-alt"></i>
							<h6>REAL TIME EVALUATION</h6>
						</div>
						<div class="col-md-4 dashcard" style="background-color:#415f8f !important; ">
							<i class="ace-icon fa fa-fire "></i>
							<h6>GSLA</h6>
						</div>
						<div class="col-md-4 dashcard" style="background-color:#ffb752 !important; ">
							<i class="ace-icon fa fa-external-link "></i>
							<h6>BENEFICIARY REGISTRATION</h6>
						</div>
				</div>

			</div>
		</div>
	</div>
</div>


@endsection