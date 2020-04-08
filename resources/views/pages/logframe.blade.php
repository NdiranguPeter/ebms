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

                <a href="/meal" class="btn btn-default" style="float:right;">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Back to dashboard
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

                    <a href="/outcomes/{{$project->id}}">
                        <div class="col-md-4 dashcard " style="background-color:#428bca !important; ">
                            <i class="ace-icon fa fa-flag "></i>
                            <h6>Outcomes|Objectives </h6>
                            {{-- <span class="badge badge-white" style="float:right;">{{$number_outcomes}}</span> --}}
                        </div>
                    </a>
                    <a href="" data-toggle="modal" data-target="#selectOutcome">
                        <div class="col-md-4 dashcard" style="background-color:#d15b47 !important; ">
                            <i class="ace-icon fa fa-fire"></i>
                            <h6>Output</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>
                    <a href="/indicators/{{$project->id}}">
                        <div class="col-md-4 dashcard" style="background-color:#415f8f !important; ">
                            <i class="ace-icon fa fa-lightbulb-o "></i>

                            <h6>Indicators</h6>

                        </div>
                    </a>

                </div>

                <div class="row">
                    <a href="/activities/{{$project->id}}">
                        <div class="col-md-4 dashcard" style="background-color:#abbac3 !important; ">
                            <i class="ace-icon fa fa-lemon-o "></i>

                            <h6>Activities</h6>
                            {{-- <span class="badge badge-success" style="float:right;">{{$number_activities}}</span>
                            --}}

                        </div>
                    </a>

                    <a href=""  data-toggle="modal" data-target="#selectRiskFor">
                        <div class="col-md-4 dashcard " style="background-color:#87b87f !important; ">
                            <i class="ace-icon fa fa-bullhorn "></i>
                            <h6>Risks </h6>
                            {{-- <span class="badge badge-white" style="float:right;">{{$number_outcomes}}</span> --}}
                        </div>
                    </a>
                    <a href="" data-toggle="modal" data-target="#selectAssumptionFor">
                        <div class="col-md-4 dashcard" style="background-color:#ffb752 !important; ">
                            <i class="ace-icon fa fa-leaf"></i>
                            <h6>Assumptions</h6>
                            {{-- <span class="badge badge-primary" style="float:right;">{{$number_outputs}}</span> --}}
                        </div>
                    </a>


                </div>

                <div class="modal fade" id="selectOutcome" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select outcome</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($outcomes)>0)
                                <table class="table table-bordered">

                                    @foreach ($outcomes as $outcome)

                                    <tr>
                                        <td><a href="/outputs/{{$outcome->id}}">{!!$outcome->name!!}</a></td>
                                    </tr>

                                    @endforeach
                                </table>
                                {{-- {{$outcomes->links()}} --}}
                                @else
                                <a href="/outcomes/create/{{$project->id}}">Create a outcome</a>
                                @endif

                            </div>
                            <div class="modal-footer">
                                <a href="/outcomes/create/{{$project->id}}">Create a outcome</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="selectRiskFor" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Risk Property</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <a class="btn btn-primary" href="/risks/goal/{{$project->id}}">Goal</a>
                                <a class="btn btn-success" href="/risks/outcome/{{$project->id}}">Outcome</a>
                                <a class="btn btn-primary" href="/risks/output/{{$project->id}}">Output</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="selectAssumptionFor" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Assumption Property</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <a class="btn btn-primary" href="/assumptions/goal/{{$project->id}}">Goal</a>
                                <a class="btn btn-success" href="/assumptions/outcome/{{$project->id}}">Outcome</a>
                                <a class="btn btn-primary" href="/assumptions/output/{{$project->id}}">Output</a>
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