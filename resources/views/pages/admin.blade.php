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
                  
                    @if (auth()->user()->role == 999)
                    <a href="/regional/2018">
                        <div class="col-md-4 dashcard" style="background-color:#2A4B7C !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>
                        
                            <h6>MEAL Regional Dashboard</h6>                                
                               
                        </div>
                    </a>
                    @endif

                    @if (auth()->user()->role == 1)
                    <a href="/kenya">
                        <div class="col-md-4 dashcard" style="background-color:#2A4B7C !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>
                    
                            <h6>Kenya</h6>
                    
                        </div>
                    </a>
                    @endif

                    @if (auth()->user()->role == 2)
                    <a href="/somalia">
                        <div class="col-md-4 dashcard" style="background-color:#2A4B7C !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>
                    
                            <h6>Somalia</h6>
                    
                        </div>
                    </a>
                    @endif

                    @if (auth()->user()->role == 3)
                    <a href="/ethiopia">
                        <div class="col-md-4 dashcard" style="background-color:#2A4B7C !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>
                    
                            <h6>Ethiopia</h6>
                    
                        </div>
                    </a>
                    @endif

                    @if (auth()->user()->role == 4)
                    <a href="/sudan">
                        <div class="col-md-4 dashcard" style="background-color:#2A4B7C !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>                    
                            <h6>Sudan</h6>                    
                        </div>
                    </a>
                    @endif

                    @if (auth()->user()->role == 5)
                    <a href="/southsudan">
                        <div class="col-md-4 dashcard" style="background-color:#2A4B7C !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>                    
                            <h6>South Sudan</h6>                    
                        </div>
                    </a>
                    @endif


                </div>

            </div>
        </div>
    </div>
</div>


@endsection