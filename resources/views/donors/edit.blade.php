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
                    <a href="/sectors">Sectors</a>
                </li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Edit project sector
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <div class=" col-sm-6">
                        {!! Form::open(['action'=>['SectorsController@update',$sector->id], 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Project sector')}}
                            {{Form::text('name', $sector->name, ['class' => 'form-control', 'placeholder' => 'sector name'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update sector', ['class'=>'btn btn-primary'])}}
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection