<ul class="nav nav-list">
	<li class="{{ (request()->is('home')) ? 'active' : '' }}">
		<a href="/home">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>


	<li class="{{ (request()->is('surveys')) ? 'active' : '' }}">
		<a href="/surveys">
			<i class="menu-icon fa fa-folder-o"></i>
			<span class="menu-text"> Surveys</span>
		</a>

		<b class="arrow"></b>
	</li>

	{{-- <li class="{{ (request()->is('projects')) ? 'active' : '' }}">
	<a href="/projects">
		<i class="menu-icon fa fa-info-circle"></i>
		<span class="menu-text"> Project Profile </span>
	</a>

	<b class="arrow"></b>
	</li> --}}
	<li class="{{ (request()->is('meal')) ? 'active' : '' }}">
		<a href="/meal">
			<i class="menu-icon fa fa-bar-chart-o"></i>
			<span class="menu-text"> MEAL </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ (request()->is('beneficiary')) ? 'active' : '' }}">
			<i class="menu-icon fa fa-external-link"></i>
			<span class="menu-text"> Beneficiary </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ (request()->is('distribution')) ? 'active' : '' }}">
			<i class="menu-icon fa  fa-gift"></i>
			<span class="menu-text"> Distribution </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ (request()->is('supplychain')) ? 'active' : '' }}">
			<i class="menu-icon fa fa-exchange"></i>
			<span class="menu-text"> Supply Chain </span>
		</a>

		<b class="arrow"></b>
	</li>



	<li class="">
		<a href="{{ (request()->is('datacollectors')) ? 'active' : '' }}">
			<i class="menu-icon fa fa-users"></i>
			<span class="menu-text"> Data Collectors </span>
		</a>

		<b class="arrow"></b>
	</li>

	{{-- <li class="{{ (request()->is('settings')) ? 'active' : '' }}">
	<a href="/settings">
		<i class="menu-icon fa fa-cogs"></i>
		<span class="menu-text"> Settings </span>
	</a>

	<b class="arrow"></b>
	</li> --}}
</ul><!-- /.nav-list -->