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
                <li class="active">RTE</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header">
                <h1>
                    RTE

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <a href="/projects">
                        <div class="col-md-6 dashcard " style="background-color:#428bca !important; ">

                            <i class="ace-icon fa fa-info-circle "></i>
                            <h6>Project Profile</h6>
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectProject">
                        <div class="col-md-6 dashcard" style="background-color:#d15b47 !important; ">
                            <i class="ace-icon fa fa-desktop"></i>
                            <h6>logic model</h6>
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectOutcome">
                        <div class="col-md-6 dashcard" style="background-color:#abbac3 !important; ">
                            <i class="ace-icon fa fa-calendar "></i>
                            <h6>Planning</h6>
                        </div>
                    </a>
                    <a data-toggle="modal" data-target="#selectProject2">
                        <div class="col-md-6 dashcard" style="background-color:#87b87f !important; ">
                            <i class="ace-icon fa fa-bar-chart-o"></i>
                            <h6>Reports</h6>
                        </div>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="selectProject" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if (count($projects)>0)
                                    <table class="table table-bordered">

                                        @foreach ($projects as $project)

                                        <tr>
                                            <td><a href="/logframe/{{$project->id}}">{{$project->name}}</a></td>
                                        </tr>

                                        @endforeach
                                    </table>
                                    {{$projects->links()}}
                                    @else
                                    <a href="projects/create">Create a project</a>
                                    @endif

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="selectProject2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if (count($projects)>0)
                                    <table class="table table-bordered">

                                        @foreach ($projects as $project)

                                        <tr>
                                            <td><a href="/reports/{{$project->id}}">{{$project->name}}</a></td>
                                        </tr>

                                        @endforeach
                                    </table>
                                    {{$projects->links()}}
                                    @else
                                    <a href="projects/create">Create a project</a>
                                    @endif

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
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
                                            <td><a href="/planning/{{$outcome->id}}">{!!$outcome->name!!}</a></td>
                                        </tr>

                                        @endforeach
                                    </table>
                                    {{$outcomes->links()}}
                                    @else
                                    <a href="outcomes/create">Create a outcome</a>
                                    @endif

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
</div>


@endsection