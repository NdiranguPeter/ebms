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
                    <i class="ace-icon fa fa-cog"></i>
                    <a href="/projects">projects</a>
                </li>
                /
                <li class="active">{{$project->name}}</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                            autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div>
            <div class="clo-sm-6" style="margin-top: 20px;">
                <a class="btn btn-default" href="/projects">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Back to projects
                </a>
                <a class="btn btn-success" href="/reports/{{$project->id}}">
                    <i class="ace-icon fa fa-bar-chart"></i>
                    Reports
                </a>
                {{-- {{route('exportproject',$project->id)}} --}}
                <a class="btn btn-primary" href="/test">
                    <i class="ace-icon fa fa-download"></i>
                </a>

                <a class="btn btn-success" href="/logframe/{{$project->id}}">
                    <i class="ace-icon fa fa-desktop"></i>
                    Logic Model
                </a>
                <a class="btn btn-primary" href="/projects/{{$project->id}}/edit">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                    Edit Project
                </a>

                <a class="btn btn-success" href="/indicators/goal/create/{{$project->id}}">
                    <i class="ace-icon fa fa-plus bigger-130"></i>
                    Add Goal Indicator
                </a>
                <a style="float:right;">

                    <table>
                        <tr>
                            <td>
                                {!! Form::open(['action'=>['ProjectsController@destroy',$project->id],
                                'method'=>'POST']) !!}

                                {{Form::button('<i class="red ace-icon fa fa-trash-o">Delete</i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                {{Form::hidden('_method','DELETE')}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    </table>
                </a>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">



            <div class="container-fluid">

                <div class="row shw" style="padding:50px; border: 1px solid #2da0ef;">

                    <b style="color:#0081c3;">
                        Project Name: {{$project->name}}
                    </b>
                    <hr>
                    <div class="col-sm-6">
                        <p><b>Country: </b>{{$country->name}}</p>
                        <p><b>IR Implementing Office: </b>{{$office->name}}</p>
                        <p><b>Location: </b>{{$project->location}}</p>
                        <p><b>IRW Pin Code: </b>{{$project->irw_pin}}</p>
                        <p><b>Project Stage: </b>{{$project->stage}}</p>
                        <p><b>Project Type: </b>{{$project->type}}</p>
                        <p><b>Project Budget: </b>{{$project->currency}}. {{$project->budget}} </p>
                    </div>
                    <div class="col-sm-6">
                        <p><b>Project Sector: </b>{{$project->sector}}</p>
                        <p><b>Target Group: </b>{{$target_group->name}}</p>
                        <p><b>Partners: </b>{{$project->partners}}</p>
                        <p><b>Donors: </b>{{$project->donors}}</p>
                        <p><b>Start Date: </b>{{$project->start}}</p>
                        <p><b>End Date: </b>{{$project->end}}</p>
                        <table>
                            <thead>
                                <th><b>Global goal: </b></th>
                                <th><b>Split</b></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding-right: 100px;">
                                        <table>
                                            @foreach ($global_goals as $global_goal)

                                            <tr>

                                                <td>
                                                    {{$global_goal}}
                                                </td>


                                            </tr>

                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($global_goals_split as $global_goal_split)

                                            <tr>

                                                <td>
                                                    {{$global_goal_split}} %
                                                </td>


                                            </tr>

                                            @endforeach
                                        </table>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <table>
                            <thead>
                                <th><b>Sector: </b></th>
                                <th><b>Split</b></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding-right: 100px;">
                                        <table>
                                            @foreach ($sectors as $sector)

                                            <tr>

                                                <td>
                                                    {{$sector}}
                                                </td>


                                            </tr>

                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($sectors_split as $sector_split)

                                            <tr>

                                                <td>
                                                    {{$sector_split}} %
                                                </td>


                                            </tr>

                                            @endforeach
                                        </table>

                                    </td>
                                </tr>

                            </tbody>
                        </table>


                        <table>
                            <thead>
                                <th><b>SDG: </b></th>
                                <th><b>Split</b></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding-right: 100px;">
                                        <table>
                                            @foreach ($sdgs as $sdg)

                                            <tr>

                                                <td>
                                                    {{$sdg}}
                                                </td>


                                            </tr>

                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($sdgs_split as $sdg_split)

                                            <tr>

                                                <td>
                                                    {{$sdg_split}} %
                                                </td>


                                            </tr>

                                            @endforeach
                                        </table>

                                    </td>
                                </tr>

                            </tbody>
                        </table>


                    </div>

                    <div class="col-sm-12">
                        <hr>
                        <p><b>Project Goal: </b>{!!$project->goal!!}</p>
                        <hr>
                        <p><b>Project Descrption: </b>{!!$project->description!!}</p>
                        <hr>
                        <p>Created on: <small>{{$project->created_at}}</small></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection