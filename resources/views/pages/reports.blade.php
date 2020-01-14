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
                <a href="/meal" class="btn btn-success" style="float:right;">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Back to Dashboard
                </a>
                <b style="color:#0081c3;">
                    {{$project->name}}
                </b>

            </div><!-- /.page-header -->
            <?php 
                // $number_outputs = count($outputs);
                // $number_outcomes = count($outcomes);   
                // $number_activities = count($activities);   
                ?>
            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="row">
                    <a href="/projects/{{$project->id}}">
                        <div class="col-md-4 dashcard " style="background-color:#428bca !important; ">
                            <i class="ace-icon fa fa-desktop "></i>
                            <h6>Project Profile </h6>
                            {{-- <span class="badge badge-white" style="float:right;">{{$number_outcomes}}</span> --}}
                        </div>
                    </a>
                    <a href="/logfr/{{$project->id}}">
                        <div class="col-md-4 dashcard" style="background-color:#ffb752 !important; ">
                            <i class="ace-icon fa fa-book"></i>
                            <h6>Logic model</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectWhen">
                        <div class="col-md-4 dashcard" style="background-color:#abbac3 !important; ">
                            <i class="ace-icon fa fa-calendar"></i>
                            <h6>DIP</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectYear">
                        <div class="col-md-4 dashcard" style="background-color:#d15b47 !important; ">
                            <i class="ace-icon fa fa-flask"></i>
                            <h6>Project Perfomance Reports</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>

                    <a href="/budget/{{$project->id}}">
                        <div class="col-md-4 dashcard" style="background-color:#87b87f !important; ">
                            <i class="ace-icon fa fa-arrow-circle-o-down"></i>
                            <h6>Budget Report</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectBeforeAfter">

                        <div class="col-md-4 dashcard" style="background-color:#415f8f !important; ">
                            <i class="ace-icon fa fa-lemon-o "></i>

                            <h6>Assumptions Table</h6>
                            {{-- <span class="badge badge-success" style="float:right;">{{$number_activities}}</span>
                            --}}

                        </div>
                    </a>
                    <a href="/bva/{{$project->id}}">
                        <div class="col-md-4 dashcard" style="background-color:#9889c1 !important; ">
                            <i class="ace-icon fa fa-download "></i>

                            <h6>BVA Report</h6>
                            {{-- <span class="badge badge-success" style="float:right;">{{$number_activities}}</span>
                            --}}

                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectBeforeAfter2">

                        <div class="col-md-4 dashcard" style="background-color:#d6487e !important; ">
                            <i class="ace-icon fa fa-info-circle "></i>

                            <h6>Risk Register Report</h6>
                            {{-- <span class="badge badge-success" style="float:right;">{{$number_activities}}</span>
                            --}}

                        </div>
                    </a>
                    <a href="/pars/{{$project->id}}">
                        <div class="col-md-4 dashcard" style="background-color:#000 !important; ">
                            <i class="ace-icon fa fa-globe "></i>

                            <h6>Partners Details</h6>
                            {{-- <span class="badge badge-success" style="float:right;">{{$number_activities}}</span>
                            --}}

                        </div>
                    </a>

                </div>

                <div class="modal fade" id="selectWhen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Period</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                {!! Form::open(['action'=>'PagesController@dipbefore']) !!}
                                <div class="form-group col-sm-6">
                                    <input type="hidden" name="project_id" value={{$project->id}}>
                                    {{Form::label('year', 'Select year')}}
                                    <select name="year" id="year"
                                        class="form-control @error('year') is-invalid @enderror">
                                        @php
                                        $datetime3 = new DateTime($project->start);
                                        $datetime1 = new DateTime($project->start);
                                        $datetime2 = new DateTime($project->end);
                                        $interval = $datetime1->diff($datetime2);
                                        $years = $interval->format('%y');
                                        $startyear = $datetime1->format('Y');
                                        $startyr = $datetime3->format('Y');
                                        $endyear = $datetime2->format('Y');
                                        @endphp

                                        @for ($i =$startyr; $i <= $endyear; $i++) <option value={{$i}}>{{$i}}</option>
                                            @endfor
                                    </select>

                                </div>

                                <div class="form-group col-sm-6">
                                    {{Form::label('Before or After', 'Select ')}}
                                    <select name="before_after" id="before_after"
                                        class="form-control @error('year') is-invalid @enderror">
                                        <option value="before" selected>Before</option>
                                        <option value="after">After</option>

                                    </select>
                                </div>

                                {{Form::submit('Open', ['class'=>'btn btn-primary right','style'=>'margin-left: 88% !important;'])}}
                                {!! Form::close() !!}

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="selectBeforeAfter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select when</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><a class="btn btn-primary" href="/assumption/before/{{$project->id}}">Before
                                                the
                                                Project</a></td>
                                        <td><a class="btn btn-success" href="/assumption/after/{{$project->id}}">After
                                                the
                                                Project</a></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="selectBeforeAfter2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select when</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><a class="btn btn-primary" href="/risk/before/{{$project->id}}">Before the
                                                Project</a></td>
                                        <td><a class="btn btn-success" href="/risk/after/{{$project->id}}">After the
                                                Project</a></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="selectYear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select year</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                $datetime3 = new DateTime($project->start);
                                $datetime1 = new DateTime($project->start);
                                $datetime2 = new DateTime($project->end);
                                $interval = $datetime1->diff($datetime2);
                                $years = $interval->format('%y');
                                $startyear = $datetime1->format('Y');
                                $startyr = $datetime3->format('Y');
                                $endyear = $datetime2->format('Y');

                                @endphp

                                @for ($i =$startyr; $i <= $endyear; $i++) @php if (($i % 2) !=0) { $tnb="success" ; } if
                                    (($i % 2)==0) { $tnb="primary" ; } @endphp <div><a style="margin-left:20px;"
                                        class="col-sm-2 btn btn-{{$tnb}}"
                                        href="/perfomance/{{$project->id}}/{{$i}}">{{$i}}</a></div>
                            @endfor

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
</div>


@endsection