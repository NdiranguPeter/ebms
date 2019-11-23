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
                    <i class="ace-icon fa fa-users"></i>
                    <a href="/partners">Partners</a>
                </li>


            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Add {{$msg}} Assumption

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="well col-sm-12">

                    {!! Form::open(['action'=>'AssumptionsController@store', 'method'=>'POST']) !!}
                    @csrf
                    <input type="hidden" name="goal_id" value=0>

                    <input type="hidden" name="outcome_id" value=0>
                    <input type="hidden" name="output_id" value=0>
                    <input type="hidden" name="activity_id" value=0>
                    <input type="hidden" name="project_id" value={{$project->id}}>
                    <div class="col-sm-12">
                        @if ($goal == 1)
                        <input type="hidden" name="goal_id" value={{$project->id}}>
                        @endif

                        @if ($outcome == 1)
                        <div class="form-group">
                            {{Form::label('outcome', 'Outcome')}}
                            <select name="outcome_id" id="outcome_id"
                                class="form-control @error('outcome_id') is-invalid @enderror">
                                @foreach ($outcomes as $outcome)
                                <option value={{$outcome->id}}>{{$outcome->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @endif
                        @if ($output == 1)
                        <div class="form-group">
                            {{Form::label('output', 'Output')}}
                            <select name="output_id" id="output_id"
                                class="form-control @error('output_id') is-invalid @enderror">
                                @foreach ($outputs as $output)
                                <option value={{$output->id}}>{{$output->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @endif
                        @if ($activity == 1)
                        <div class="form-group">
                            {{Form::label('activity', 'Activity')}}
                            <select name="activity_id" id="activity_id"
                                class="form-control @error('activity_id') is-invalid @enderror">
                                @foreach ($activities as $activity)
                                <option value={{$activity->id}}>{{$activity->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @endif


                    </div>


                    <div class="form-group col-sm-6">
                        {{Form::label('name', 'Assumption name')}}
                        {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Assumption name'])}}
                    </div>
                    <div class="form-group col-sm-6">
                        {{Form::label('owner', 'Assumption owner')}}
                        {{Form::text('owner','', ['class' => 'form-control', 'placeholder' => 'owner'])}}
                    </div>
                    <div class="form-group col-sm-6">
                        {{Form::label('reason', 'Reason for assumption')}}
                        {{Form::textarea('reason', '', ['class' => 'form-control', 'placeholder' => 'reason'])}}
                    </div>
                    <div class="form-group col-sm-6">
                        {{Form::label('validation', 'How to validate')}}
                        {{Form::textarea('validation', '', ['class' => 'form-control', 'placeholder' => 'validate'])}}
                    </div>



                    <div class="form-group col-sm-6">
                        {{Form::label('description', 'Impact description')}}
                        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'description'])}}
                    </div>
                    <div class="form-group col-sm-6">
                        {{Form::label('response', 'Response Strategy')}}
                        {{Form::textarea('response', '', ['class' => 'form-control', 'placeholder' => 'Response strategy'])}}
                    </div>
                    <div style="float:right;">
                        {{Form::submit('Save Assumption', ['class'=>'btn btn-primary'])}}
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection