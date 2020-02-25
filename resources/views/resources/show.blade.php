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
                    <a href="">Resources</a>
                </li>
                /
                <li class="active"></li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row shw" style="padding:20px; ">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Activity </th>
                                <th>Resource</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($vs as $v)
                            <tr>
                                <td> {{$counter}} </td>
                                <td> @foreach ($activities as $activity)
                                @if ($activity->id == $v->activity_id)
                                {{$activity->name}}
                                @endif
                                @endforeach</td>
                                <td> {{$v->name}} </td>

                                <td>

                                    {!! Form::open(['action'=>['ResourcesController@destroy', $v->id],
                                    'method'=>'POST']) !!}
                                    <input type="hidden" name='project_id' value={{$project_id}}>
                                    
                                    {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}
                                    
                                    {{Form::hidden('_method','DELETE')}}
                                    {!!Form::close()!!}

                                </td>
                            </tr>
                            <?php $counter++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div style="min-height: 20px;">
                <a class="btn btn-light" href="/activities/{{$project_id}}">Back to activities</a>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection