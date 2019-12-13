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
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{$project->name}} -
                    indicators
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                <div class="row">
                    <a href="/logframe/{{$project->id}}" class="btn btn-default" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                        Back to logic model
                    </a>
                    @if (count($indicators) > 0)
                    <a data-toggle="modal" data-target="#selectIndicator" class="btn btn-primary"
                        style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add Verification source
                    </a>
                    @endif
                    <div class="col-sm-12" style="min-height:20px !important;">
                        @include('layouts.messages')
                    </div>
                    @if (count($indicators) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">indicator</th>
                                <th scope="col">Created</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($indicators as $indicator)
                            <tr style="font-size: smaller;">
                                <th scope="row">{{$indicator->i_order}}</th>
                                <td scope="row"><a href="/indicators/{{$indicator->id}}/edit">{!!$indicator->name!!}</a>
                                </td>
                                <td scope="row">{!!$indicator->created_at!!}</td>
                                <td scope="row">
                                    <table>
                                        <tr>
                                            <td style="padding:10px;">
                                                <a class="green" href="/indicators/{{$indicator->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            </td>
                                            <td style="padding:10px;">
                                                {!!
                                                Form::open(['action'=>['IndicatorsController@destroy',$indicator->id],
                                                'method'=>'POST']) !!}

                                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                                {{Form::hidden('_method','DELETE')}}
                                                {!!Form::close()!!}
                                            </td>
                                            <td style="padding:10px;">
                                                <a class="green" href="/indicators/before/{{$indicator->id}}">
                                                    <i class="ace-icon fa fa-refresh bigger-130">before</i>
                                                </a>
                                            </td>
                                            <td style="padding:10px;">
                                                <a class="blue" href="/indicators/after/{{$indicator->id}}">
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
                    {{$indicators->links()}}
                    @else
                    <p>No indicator created yet</p>
                    @endif
                </div>
                <div class="modal fade" id="selectIndicator" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Indicator</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($indicators)>0)
                                <table class="table table-bordered">
                                    @foreach ($indicators as $indicator)
                                    <tr style="font-size: smaller;">
                                        <td>
                                            <a
                                                href="/verifiablesource/create/{{$indicator->id}}">{!!$indicator->name!!}</a>
                                        </td>
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


@endsection