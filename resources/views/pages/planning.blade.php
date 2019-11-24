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
                <li class="active">Planning</li>
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

                <div class="row">
                    <a href="/outputs/{{$outcome->id}}" class="btn btn-default" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                        Back to Outputs
                    </a>
                    {{-- {{route('exportdip',$outcome->id)}} --}}
                    <a href="/export_report" class="btn btn-success" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon fa fa-download"></i>
                        Download DIP
                    </a>
                    @include('planning.table',$outputs)

                </div>
            </div>
        </div>
    </div>
</div>


@endsection