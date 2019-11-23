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
                        Projects
                    </a>
                </li>
                /
                <li class="active">Reports</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">

            <div class="page-header">
                <a href="/reports/{{$project->id}}" class="btn btn-success" style="float:right;">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    All reports
                </a>
                <b style="color:#0081c3;">
                    {{$project->name}}
                </b>

            </div>
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="row">

                    <a data-toggle="modal" data-target="#selectMonth">
                        <div class="col-md-4 dashcard" style="background-color:#87b87f !important; ">
                            <i class="ace-icon fa fa-flask"></i>
                            <h6>Monthly Report</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectQuater">
                        <div class="col-md-4 dashcard" style="background-color:#d15b47 !important; ">
                            <i class="ace-icon fa fa-flask"></i>
                            <h6>Quarterly Report</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a><a href="/yearly/repo/{{$project->id}}/{{$year}}">
                        <div class="col-md-4 dashcard" style="background-color:#428bca !important; ">
                            <i class="ace-icon fa fa-flask"></i>
                            <h6>Yearly Report </h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectSummaryDetailed">
                        <div class="col-md-4 dashcard" style="background-color:#415f8f !important; ">
                            <i class="ace-icon fa fa-lemon-o "></i>

                            <h6>Beneficiary Report</h6>
                            {{-- <span class="badge badge-success" style="float:right;">{{$number_activities}}</span>
                            --}}

                        </div>
                    </a>

                </div>
                <div class="modal fade" id="selectMonth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Month</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-sm-12">
                                <a style="width:100px;" href="/jan/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">January</a>
                                <a style="width:100px;" href="/feb/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">February</a>
                                <a style="width:100px;" href="/mar/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">March</a>
                                <a style="width:100px;" href="/apr/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">April</a>
                                <a style="width:100px;" href="/may/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">May</a>
                                <a style="width:100px;" href="/jun/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">June</a>
                                <a style="width:100px;" href="/jul/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">July</a>
                                <a style="width:100px;" href="/aug/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">August</a>
                                <a style="width:100px;" href="/sep/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">September</a>
                                <a style="width:100px;" href="/oct/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">October</a>
                                <a style="width:100px;" href="/nov/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">November</a>
                                <a style="width:100px;" href="/dec/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">December</a>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="selectQuater" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Month</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-sm-12">
                                <a style="width:100px;" href="/qrt1/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">QRT 1</a>
                                <a style="width:100px;" href="/qrt2/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">QRT 2</a>
                                <a style="width:100px;" href="/qrt3/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">QRT 3</a>
                                <a style="width:100px;" href="/qrt4/repo/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">QRT 4</a>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="selectSummaryDetailed" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Summary or Detailed report</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-sm-12">
                                <a style="width:100px;" href="/beneficiary/{{$project->id}}/{{$year}}"
                                    class="btn btn-success">Summary</a>
                                <a style="width:100px;" href="/benefi/{{$project->id}}/{{$year}}"
                                    class="btn btn-primary">Detailed</a>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection