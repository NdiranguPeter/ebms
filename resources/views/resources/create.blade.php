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
                    {!!$activity->name!!}
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

                <div class="well col-sm-8">
                    {!! Form::open(['action'=>'ResourcesController@store', 'method'=>'POST']) !!}
                    @csrf
                    <input type="hidden" name='activity_id' value={{$activity->id}}>

                    <div class="form-group">
                        {{Form::label('name', 'Resource name')}}
                        {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'name'])}}
                    </div>

                    <div style="float:right;">
                        {{Form::submit('Save Resource', ['class'=>'btn btn-primary'])}}
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection