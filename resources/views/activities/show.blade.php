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
                <li class="active">

                    {{$project->name}} - All activities

                </li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div>


                <a href="/logframe/{{$project->id}}" class="btn btn-default" style="float:left; margin-bottom: 2%;">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Back to logic model
                </a>

                <a data-toggle="modal" data-target="#selectActivity" class="btn btn-primary"
                    style="float:right; margin-bottom: 2%;">
                    <i class="ace-icon glyphicon glyphicon-plus"></i>
                    Add Resource
                </a>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @isset($error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endisset

                <div class="row">

                    <div class="col-sm-12" style="min-height:20px !important;">
                        @include('layouts.messages')
                    </div>


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
                                <td scope="row">{!!$activity->created_at!!}</td>
                                <td scope="row" style="width: 200px;">
                                    <table>
                                        <tr>
                                            <td style="padding:10px;">
                                                <a class="green" href="/activities/{{$activity->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            </td>
                                            <td style="font-size: smaller;">
                                                {!!
                                                Form::open(['action'=>['ActivitiesController@destroy',$activity->id],
                                                'method'=>'POST']) !!}

                                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                                {{Form::hidden('_method','DELETE')}}
                                                {!!Form::close()!!}
                                            </td>
                                            <td style="padding:10px; font-size: x-small;">
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

                <div class="modal fade" id="selectActivity" tabindex="-1" role="dialog"
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
                                @if (count($activities)>0)
                                <table class="table table-bordered">

                                    @foreach ($activities as $activity)

                                    <tr style="font-size: smaller;">
                                        <td><a href="/resources/create/{{$activity->id}}">{!!$activity->name!!}</a></td>
                                    </tr>

                                    @endforeach
                                </table>

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
<script>
    $(document).ready(function() {
// show the alert
setTimeout(function() {
$(".alert").alert('close');
}, 3600);
});
</script>

@endsection