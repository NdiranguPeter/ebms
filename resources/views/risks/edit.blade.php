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
                    Edit {{$msg}} Risk
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="well col-sm-12">
                    {!! Form::open(['action'=>['RisksController@update',$risk->id], 'method'=>'POST']) !!}
                    @csrf
                    <input type="hidden" name="goal_id" value=0>
                    <input type="hidden" name="outcome_id" value=0>
                    <input type="hidden" name="output_id" value=0>
                    <input type="hidden" name="activity_id" value=0>
                    <input type="hidden" name="project_id" value={{$project->id}}>
                    <div class="col-sm-6">
                        @if ($goal == 1)
                        <input type="hidden" name="goal_id" value={{$project->id}}>
                        @endif
                        @if ($outcome == 1)
                        <div class="form-group">
                            {{Form::label('outcome', 'Outcome')}}
                            <select name="outcome_id" id="outcome_id"
                                class="form-control @error('outcome_id') is-invalid @enderror">
                                @foreach ($outcomes as $outcome)
                                <option value={{$outcome->id}} @if($outcome->id == $risk->outcome_id) selected
                                    @endif>{{$outcome->name}}</option>
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
                                <option value={{$output->id}} @if($output->id == $risk->output_id) selected
                                    @endif>{{$output->name}}</option>
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
                                <option value={{$activity->id}} @if($activity->id == $risk->activity_id) selected @endif
                                    >{{$activity->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            {{Form::label('name', 'Risk name')}}
                            {{Form::text('name', $risk->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('category', 'Risk Category')}}
                            <select name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror">
                                <option value="Not Defined" @if($risk->category == "Not Defined") selected @endif>Not
                                    Defined</option>
                                <option value="Operational Risk" @if($risk->category == "Operational Risk") selected
                                    @endif>Operational Risk</option>
                                <option value="Financial Risk" @if($risk->category == "Financial Risk") selected
                                    @endif>Financial Risk </option>
                                <option value="Objective Risk" @if($risk->category == "Objective Risk") selected
                                    @endif>Objective Risk </option>
                                <option value="Reputation Risk" @if($risk->category == "Reputation Risk") selected
                                    @endif>Reputation Risk </option>
                                <option value="Other" @if($risk->category == "Other") selected @endif>Other</option>

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('level', 'Risk level')}}
                            {{Form::number('level',$risk->level, ['class' => 'form-control', 'placeholder' => '0%'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('likelihood', 'Likelihood')}}
                            <select name="likelihood" id="likelihood"
                                class="form-control @error('likelihood') is-invalid @enderror">
                                <option value="Not Defined" @if($risk->likelihood == "Not Defined") selected @endif>Not
                                    Defined</option>
                                <option value="Very Unlikely" @if($risk->likelihood == "Very Unlikely") selected
                                    @endif>Very unlikely</option>
                                <option value="Unlikely" @if($risk->likelihood == "Unlikely") selected @endif>Unlikely
                                </option>
                                <option value="Likely" @if($risk->likelihood == "Likely") selected @endif>Likely
                                </option>
                                <option value="Very likely" @if($risk->likelihood == "Very likely") selected @endif>Very
                                    likely
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('impact', 'Potential impact')}}
                            <select name="impact" id="impact"
                                class="form-control @error('impact') is-invalid @enderror">
                                <option value="Unknown" @if($risk->impact == "Unknown") selected @endif>Unknown</option>
                                <option value="very low" @if($risk->impact == "very low") selected @endif>Very low -
                                    Routine
                                    procedures are sufficient to deal with
                                    consequences should the risk occur</option>
                                <option value="low" @if($risk->impact == "low") selected @endif>Low - this risk may
                                    require monitoring. </option>
                                <option value="high" @if($risk->impact == "high") selected @endif>High - this risk may
                                    require review. </option>
                                <option value="very high" @if($risk->impact == "very high") selected @endif>Very High
                                </option>

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('response', 'Response')}}
                            <select name="response" id="response"
                                class="form-control @error('response') is-invalid @enderror">
                                <option value="not defined" @if($risk->response == "not defined") selected @endif>Not
                                    defined
                                </option>
                                <option value="Avoiding Risk" @if($risk->response == "Avoiding Risk") selected
                                    @endif>Avoiding Risk
                                </option>
                                <option value="Reducing Risk" @if($risk->response == "Reducing Risk") selected
                                    @endif>Reducing Risk
                                </option>
                                <option value="Sharing Risk" @if($risk->response == "Sharing Risk") selected
                                    @endif>Sharing Risk
                                </option>
                                <option value="Transferring Risk" @if($risk->response == "Transferring Risk") selected
                                    @endif>Transferring Risk</option>
                                <option value="Accepting Risk" @if($risk->response == "Accepting Risk") selected
                                    @endif>Accepting Risk
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('owner', 'Risk owner')}}
                            {{Form::text('owner',$risk->owner, ['class' => 'form-control', 'placeholder' => 'owner'])}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('description', 'Impact description')}}
                            {{Form::textarea('description', $risk->description, ['class' => 'form-control', 'placeholder' => 'description'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('strategy', 'Response Strategy')}}
                            {{Form::textarea('strategy', $risk->strategy, ['class' => 'form-control', 'placeholder' => 'Response strategy'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update Risk', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection