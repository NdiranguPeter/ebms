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
                <li class="active">Partners</li>
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
                <a href="/test" class="btn btn-primary" style="float:right; margin-left: 20px;">
                    <i class="ace-icon fa fa-download"></i>
                    Download Partners Details
                </a>
                <a href="/reports/{{$project->id}}" class="btn btn-success" style=" float:right;">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Back to Reports
                </a>
                <h1>
                    Partners List
                </h1>



            </div><!-- /.page-header -->

            <div class="container-fluid">

                @include('reports.partners')
            </div>
        </div>
    </div>
</div>


@endsection