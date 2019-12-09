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
                <li>
                    <a href="/projects">{!!$project->name!!}</a>
                </li>
                /
                <li class="active">{!!$outcome->name!!}</li>
            </ul>
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Outputs
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <a href="/outcomes/{{$project->id}}" class="btn btn-default" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                        Back to outcomes
                    </a>
                    <table class="table-bordered" style="float:right;">
                        <tr>
                            <td>
                                <a data-toggle="modal" data-target="#selectOutput2" class="btn btn-success">
                                    <i class="ace-icon fa fa-plus-circle"></i>
                                    Add indicators
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#selectOutput" class="btn btn-primary">
                                    <i class="ace-icon fa fa-plus-circle"></i>
                                    Add activities
                                </a>
                            </td>
                        </tr>
                    </table>

                    <a href="/outputs/create/{{$outcome->id}}" class="btn btn-primary"
                        style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add output
                    </a>
                    <a href="/planning/{{$outcome->id}}" class="btn btn-success" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-th"></i>
                        Planning
                    </a>
                    @include('layouts.messages')

                    @if (count($outputs) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">output</th>
                                <th scope="col">Created</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($outputs as $output)
                            <tr style="font-size:smaller;">
                                <th scope="row">{{$i}}</th>
                                <td scope="row"><a href="/activities/output/{{$output->id}}">{!!$output->name!!}</a>
                                </td>
                                <td scope="row">{!!$output->created_at!!}</td>
                                <td scope="row">
                                    <table>
                                        <tr>
                                            <td style="padding:10px;">
                                                <a class="green" data-toggle="modal" data-target="#editOutput">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            </td>
                                            <td>
                                                {!! Form::open(['action'=>['OutputsController@destroy',$output->id],
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
                    @else
                    <p>No project outputs created yet</p>
                    @endif
                </div>
                <div class="modal fade" id="editOutput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editOutput">Select Output</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($outputs)>0)
                                {!! Form::open(['action'=>['OutputsController@update', $output->id
                                ],'method'=>'POST']) !!}
                                <div class="form-group">
                                    {{Form::label('output', 'Output name')}}
                                    {{Form::textarea('output', $output->name, [ 'class' => 'form-control', 'placeholder' => 'Output name'])}}
                                </div>
                                {{Form::hidden('_method','PUT')}}
                                {{Form::submit('Save update', ['class'=>'btn btn-primary','style'=>'float:right;'])}}
                                {!! Form::close() !!}
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button style="float:left;" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="selectOutput" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Output</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($outputs)>0)
                                <table class="table table-bordered">

                                    @foreach ($outputs as $output)

                                    <tr>
                                        <td><a href="/activities/create/{{$output->id}}">{!!$output->name!!}</a></td>
                                    </tr>

                                    @endforeach
                                </table>
                                {{-- {{$outcomes->links()}} --}}
                                @else
                                <a href="/outputs/create/{{$outcome->id}}">Create a Output</a>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <a href="/outputs/create/{{$outcome->id}}">Create a output</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="selectOutput2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Output</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($outputs)>0)
                                <table class="table table-bordered">
                                    @foreach ($outputs as $output)
                                    <tr>
                                        <td><a href="/indicators/output/create/{{$output->id}}">{!!$output->name!!}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                {{-- {{$outcomes->links()}} --}}
                                @else
                                <a href="/outputs/create/{{$outcome->id}}">Create a Output</a>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <a href="/outputs/create/{{$outcome->id}}">Create a output</a>
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