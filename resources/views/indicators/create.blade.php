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
                        <input name="scoring" type="hidden" value=0>
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
                        {{-- <div class="form-group">
                            {{Form::label('scoring', 'Project scoring')}}
                        <select name="scoring" id="scoring" class="form-control @error('scoring') is-invalid @enderror">
                            <option value="value" selected>Value</option>

                        </select>
                    </div> --}}

                    <div class="form-group">
                        {{Form::label('indicator', 'Indicator name')}}
                        {{Form::textarea('indicator', '', ['class' => 'form-control', 'placeholder' => 'Indicator name'])}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{Form::label('unit', 'Type of unit')}}
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
                        {{Form::date('start', '', ['class' => 'form-control', 'placeholder' => 'start'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('end', 'End date')}}
                        {{Form::date('end', '', ['class' => 'form-control', 'placeholder' => 'end'])}}
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


@endsection