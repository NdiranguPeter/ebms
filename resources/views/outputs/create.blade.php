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
                <li>{!!$outcome->name!!}</li>
            </ul>

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
                    Add project output
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')

                <div class="well col-sm-12">
                    {!! Form::open(['action'=>'OutputsController@store', 'method'=>'POST']) !!}
                    <input name="id" type="hidden" value="{{$outcome->id}}">

                    <div class="form-group">
                        {{Form::label('output', 'Project output')}}
                        {{Form::textarea('output', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Project output'])}}
                    </div>

                    <a href="/outputs/{{$outcome->id}}" class="btn btn-default" style="float:left;"><i
                            class="ace-icon fa fa-arrow-circle-o-left"></i>Back to outputs</a>
                    <div style="float:right;">
                        {{Form::submit('Save output', ['class'=>'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>
</div>


@endsection