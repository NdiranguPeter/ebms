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
                    <a href="/meal">MEAL</a>
                </li>
                /
                <li class="active">Projects</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Projects

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <a href="/meal" class="btn btn-success" style="float:right;">
                        <i class="ace-icon fa fa-arrow-circle-o-right"></i>
                        Meal dashboard
                    </a>

                    <a href="/projects/create" class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add Project
                    </a>


                    @include('layouts.messages')
                    @if (count($projects) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">Project name</th>
                                <th scope="col"> Stage</th>
                                <th scope="col" style="width:100px;"> Start</th>
                                <th scope="col" style="width:100px;"> End</th>
                                <th scope="col"> Location</th>
                                <th scope="col">Status</th>
                                <th scope="col">User</th>
                                <th scope="col">Last updated</th>
                                {{-- <th scope="col">RYBG</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($projects as $project)
                            <tr style="font-size:smaller;">
                                <th scope="row">{{$i}}</th>
                                <td><a href="/projects/{{$project->id}}"> {{$project->name}} </a>
                                </td>
                                <td scope="row">{{$project->stage}}</td>
                                <td scope="row">{{$project->start}}</td>
                                <td scope="row">{{$project->end}}</td>
                                <td scope="row">{{$project->location}}</td>
                                <td scope="row">{{$project->stage}}</td>
                                <td scope="row">

                                    @foreach ($users as $user)
                                    @foreach ($projects as $project)
                                    @if ($project->user_id == $user->id)

                                    @endif
                                    @endforeach
                                    @endforeach
                                </td>
                                <td>{{$project->updated_at}}</td>
                                {{-- <td></td> --}}
                                <td>
                                    <table class="acts">
                                        <tr>
                                            <td>
                                                <a class="green" href="/projects/{{$project->id}}">
                                                    <i class="ace-icon fa fa-eye bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="blue" href="/projects/{{$project->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                {!! Form::open(['action'=>['ProjectsController@destroy',$project->id],
                                                'method'=>'POST']) !!}

                                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                                {{Form::hidden('_method','DELETE')}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                    </table>


                                </td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach

                        </tbody>
                    </table>
                    {{$projects->links()}}
                    @else
                    <p>No project created yet</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>


@endsection