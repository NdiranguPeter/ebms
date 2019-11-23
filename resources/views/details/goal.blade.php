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
                    <a href="/meal">
                        MEAL
                    </a>
                </li>
                /
                <li><a href="/logframe/{{$project->id}}">logic model</a></li>
                /
                <li class="active">{!!$project->name!!}</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">

            <div class="page-header">
                <h1>
                    {!!$outcome->name!!}
                </h1>

            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="row">
                    <a href="#">
                        <div class="col-md-4 dashcard " style="background-color:#428bca !important; ">
                            <i class="ace-icon fa fa-flag "></i>
                            <h6>Indicators</h6>
                            {{-- <span class="badge badge-white" style="float:right;">{{$number_outcomes}}</span> --}}
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-4 dashcard" style="background-color:#d15b47 !important; ">
                            <i class="ace-icon fa fa-fire"></i>
                            <h6>Verification Sources</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                        <a href="#">
                            <div class="col-md-4 dashcard" style="background-color:#abbac3 !important; ">
                                <i class="ace-icon fa fa-lemon-o "></i>

                                <h6>Assumptions</h6>
                                {{-- <span class="badge badge-success" style="float:right;">{{$number_activities}}</span>
                                --}}

                            </div>
                        </a>

                </div>
                <a href="/outcomes/{{$project->id}}" class="btn btn-primary" style="margin-top: 30px; float:right;">Back
                    to outcomes</a>
            </div>
        </div>
    </div>
</div>


@endsection