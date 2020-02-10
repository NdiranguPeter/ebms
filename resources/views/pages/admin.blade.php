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


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                   Administrator Dashboard

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                  
                    <a href="/regional">
                        <div class="col-md-4 dashcard" style="background-color:#2A4B7C !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>
                            <h6>MEAL Regional Dashboard</h6>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection