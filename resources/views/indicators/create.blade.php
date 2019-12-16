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
                    Add {{$msg}} indicator
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="well col-sm-12">
                    <div class="col-sm-12">
                        <p style="text-align: left;font-size: x-large;font-weight: bold;">
                            @if ($msg == "goal")
                            {{$project->goal}}
                            @endif
                            @if ($msg == "outcome")
                            {{$outcome->name}}
                            @endif
                            @if ($msg == "output")
                            {{$output->name}}
                            @endif
                        </p>
                    </div>
                    {!! Form::open(['action'=>'IndicatorsController@store', 'method'=>'POST']) !!}
                    <div class="col-sm-6">

                        <input name="project_id" type="hidden" value={{$project->id}}>

                        <input name="output_id" type="hidden" value=0>
                        <input name="outcome_id" type="hidden" value=0>
                        <input name="i_order" type="hidden" value={{$indicator_order+1}}>
                        <input name="goal_id" type="hidden" value=0>
                        @if ($come == 1)
                        <input name="outcome_id" type="hidden" value={{$outcome->id}}>
                        @endif
                        @if ($put == 1)
                        <input name="output_id" type="hidden" value={{$output->id}}>
                        @endif
                        @if ($goal == 1)
                        <input name="goal_id" type="hidden" value={{$project->id}}>
                        @endif


                        <div class="form-group">
                            {{Form::label('indicator', 'Indicator name')}}
                            {{Form::textarea('indicator', '', ['class' => 'form-control', 'placeholder' => 'Indicator name'])}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a style="float:right;" data-toggle="modal" data-target="#targetModal">Create unit</a>
                        <div class="form-group">
                            {{Form::label('unit', 'Indicator Scoring Unit')}}
                            <select name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror">
                                @if (count($units)>0)
                                @foreach ($units as $unit)
                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach

                                @else
                                <p>No units</p>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('target_baseline', 'Baseline')}}
                            {{Form::number('target_baseline', '', ['class' => 'form-control', 'placeholder' => 'Baseline value'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('project_target', 'Project target')}}
                            {{Form::number('project_target', '', ['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start date')}}
                            {{Form::date('start', $project->start, ['class' => 'form-control', 'placeholder' => 'start'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('end', 'End date')}}
                            {{Form::date('end', $project->end, ['class' => 'form-control', 'placeholder' => 'end'])}}
                        </div>

                        <div style="float:right;">
                            {{Form::submit('Save indicator', ['class'=>'btn btn-primary'])}}
                        </div>
                        <a href="/indicators/{{$project->id}}" class="btn btn-default" style="float:left;"><i
                                class="ace-icon fa fa-arrow-circle-o-left"></i>Back to indicators</a>
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="targetModal" tabindex="-1" role="dialog" aria-labelledby="targetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="targetModalLabel">Create Indicator Scoring Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                {!! Form::open(['action'=>'UnitsController@store', 'method'=>'POST']) !!}
                <input type="hidden" name="type" value={{$msg}}>
                @if ($come == 1)
                <input name="outcome_id" type="hidden" value={{$outcome->id}}>
                <input name="output_id" type="hidden" value=0>
                <input name="goal_id" type="hidden" value=0>
                @endif
                @if ($put == 1)
                <input name="outcome_id" type="hidden" value=0>
                <input name="output_id" type="hidden" value={{$output->id}}>
                <input name="goal_id" type="hidden" value=0>
                @endif
                @if ($goal == 1)
                <input name="outcome_id" type="hidden" value=0>
                <input name="output_id" type="hidden" value=0>
                <input name="goal_id" type="hidden" value={{$project->id}}>
                @endif

                {{Form::label('name', 'Unit name')}}
                {{Form::text('name','', ['class' => 'form-control'])}}

            </div>

            <div class="modal-footer">
                {{Form::submit('Save', ['class'=>'btn btn-primary right'])}}

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection