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
                <li class="active">logic model</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header">
                {{-- {{route('exportmonthly',$project->id)}} --}}
                <a href="/test" class="btn btn-primary" style="float:right; margin-left: 20px;">
                    <i class="ace-icon fa fa-download"></i>
                    download monthly report
                </a>
                <a href="/perfomance/{{$project->id}}/{{$year}}" class="btn btn-success" style=" float:right;">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Perfomance Reports
                </a>
                <b style="color:#0081c3;">
                    {{$project->name}}
                </b>



            </div><!-- /.page-header -->

            <div class="container-fluid">

                @include('reports.yearly')
            </div>
        </div>
    </div>
</div>


@endsection