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
                <li class="active"></li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                            autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Activities

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @isset($error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endisset

                <div class="row">
                    <a href="/logframe/{{$project->id}}" class="btn btn-success" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                        Back to logic model
                    </a>

                    <a href="/activities/create/{{$output->id}}" class="btn btn-primary"
                        style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add activity
                    </a>
                    @include('layouts.messages')

                    @if (count($activities) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">activity</th>
                                <th scope="col">Created</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($activities as $activity)
                            <tr style="font-size: smaller;">
                                <th scope="row">{{$i}}</th>
                                <td scope="row"><a href="/activities/{{$activity->id}}/edit">{!!$activity->name!!}</a>
                                </td>
                                <td scope="row" style="width: 120px;">{!!$activity->created_at!!}</td>
                                <td scope="row" style="width: 210px;">
                                    <table>
                                        <tr>
                                            <td style="padding:10px;">
                                                <a class="green" href="/activities/{{$activity->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            </td>
                                            <td>
                                                {!!
                                                Form::open(['action'=>['ActivitiesController@destroy',$activity->id],
                                                'method'=>'POST']) !!}

                                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                                {{Form::hidden('_method','DELETE')}}
                                                {!!Form::close()!!}
                                            </td>

                                            <td style="padding:10px;">
                                                |
                                                <a class="blue" href="/activities/before/{{$activity->id}}">
                                                    <i class="ace-icon fa fa-refresh bigger-130">before</i>
                                                </a>
                                                |
                                                <a class="green" href="/activities/after/{{$activity->id}}">
                                                    <i class="ace-icon fa fa-refresh bigger-130">after</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <?php $i++; ?>
                            @endforeach

                        </tbody>
                    </table>
                    {{$activities->links()}}
                    @else
                    <p>No output activity created yet</p>
                    @endif


                </div>

            </div>
        </div>
    </div>
</div>
@endsection