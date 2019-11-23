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
                <li>
                    <i class="ace-icon fa fa-bar-chart-o "></i>
                    <a href="/projects">
                        MEAL
                    </a>
                </li>
                /
                <li class="active">M & E Report</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">

            <div class="page-header">

                <b style="color:#0081c3;">
                    {{-- {{$project->name}} --}}
                </b>



            </div><!-- /.page-header -->

            <div class="container-fluid">
                @include('reports.me')

            </div>
        </div>
    </div>
</div>


@endsection