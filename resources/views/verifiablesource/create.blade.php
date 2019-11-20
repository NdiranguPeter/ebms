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
                    Add Verification source
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @isset($record)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endisset($error)

                <div class="well col-sm-12">
                    <span style="color: green; font-size:bold;">{!!$indicator->name!!}</span>
                    {!! Form::open(['action'=>'VerificationsourcesController@store', 'method'=>'POST']) !!}
                    @csrf
                    <input type="hidden" name='indicator_id' value={{$indicator->id}}>

                    <div class="form-group">
                        {{Form::label('name', 'Name')}}
                        <select name="name" id="name" class="form-control @error('frequency') is-invalid @enderror">
                            <option value="" selected>Select one</option>
                            <option value="midterm and final evaluation"></option>
                            <option value="project reports">project reports</option>
                            <option value="final evaluation surveys">final evaluation surveys</option>
                            <option value="midterm evaluation surveys">midterm evaluation surveys</option>
                            <option value="field visits">field visits</option>
                            <option value="market surveys">market surveys</option>
                            <option value="follow up by project team">follow up by project team</option>
                            <option value="member satisfaction surveys">member satisfaction surveys</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('responsibility', 'Responsibility person')}}
                        {{Form::text('responsibility','', ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('frequency', 'Frequency')}}
                        <select name="frequency" id="frequency"
                            class="form-control @error('frequency') is-invalid @enderror">
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="every 3 months">Every 3 Months</option>
                            <option value="every 4 months">Every 4 Months</option>
                            <option value="every 6 months">Every 6 Months</option>
                            <option value="annually">Annually</option>
                            <option value="at start of project">At Start Of Project</option>
                            <option value="at end of project">At End Of Project</option>
                            <option value="mid term">Mid Term</option>
                            <option value="ex post">Ex Post</option>
                            <option value="ex ante">Ex Ante</option>
                        </select>
                    </div>

                    <div class="form-group">
                        {{Form::label('source', 'Information source')}}
                        <select multiple name="source[]" id="source"
                            class="form-control @error('source') is-invalid @enderror">

                            <option value="baseline study">Baseline study</option>
                            <option value="database">Database</option>
                            <option value="evaluation forms">Evaluation forms</option>
                            <option value="external fiancial audit">External fiancial audit</option>
                            <option value="external evaluation">External evaluation</option>
                            <option value="feedback from beneficiaries">Feedback from beneficiaries</option>
                            <option value="field visits">Field visits</option>
                            <option value="followup missions">Followup missions</option>
                            <option value="gorvenment report">Gorvenment report</option>
                            <option value="gorvenment statistics">Gorvenment statistics</option>
                            <option value="field report">Field report</option>
                            <option value="activity report">Activity report</option>
                            <option value="surveys">Surveys</option>
                            <option value="training report">Training report</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('collection_method', 'Collection method')}}
                        {{Form::text('collection_method','', ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>

                    <div style="float:right;">
                        {{Form::submit('Save verification source', ['class'=>'btn btn-primary'])}}
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection