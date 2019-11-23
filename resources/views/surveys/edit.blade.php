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
                    <a href="/surveys">Surveys</a>
                </li>
                /
                <li class="active">Edit survey</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Edit surveys
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="well col-sm-12">
                    {!! Form::open(['action'=>['SurveysController@update',$survey->id], 'method'=>'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Survey name')}}
                        {{Form::text('name', $survey->name, ['class' => 'form-control', 'placeholder' => 'Survey name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('supervisor', 'Survey supervisor')}}
                        {{Form::text('supervisor', $survey->supervisor, ['class' => 'form-control', 'placeholder' => 'Survey supervisor'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('location', 'Survey location')}}
                        {{Form::text('location', $survey->location, ['class' => 'form-control', 'placeholder' => 'Actual location the survey is conducted'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Survey description')}}
                        {{Form::textarea('description', $survey->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Survey description. e.g objectives'])}}
                    </div>
                    <div style="float:right;">
                        {{Form::submit('Update Survey', ['class'=>'btn btn-primary'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {!! Form::close() !!}


                </div>

            </div>
        </div>
    </div>
</div>


@endsection