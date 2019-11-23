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
                <li class="active">{{$project->name}}</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Add project outcome
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="well col-sm-12">
                    {!! Form::open(['action'=>'OutcomesController@store', 'method'=>'POST']) !!}
                    <input name="id" type="hidden" value="{{$project->id}}">

                    <div class="form-group">
                        {{Form::label('outcome', 'Project outcome')}}
                        {{Form::textarea('outcome', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Project outcome'])}}
                    </div>
                    <div style="float:right;">
                        {{Form::submit('Save outcome', ['class'=>'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection