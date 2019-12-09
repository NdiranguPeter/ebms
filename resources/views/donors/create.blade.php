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
                    <a href="/donors">donors</a>
                </li>

            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Create project donor
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <div class=" col-sm-6">
                        {!! Form::open(['action'=>'DonorsController@store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Donor name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'donor name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('type', 'Donor type')}}
                            {{Form::text('type', '', ['class' => 'form-control', 'placeholder' => 'donor type'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('address', 'Donor address')}}
                            {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'donor address'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Donor email')}}
                            {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'donor email'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Donor phone')}}
                            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'donor phone'])}}
                        </div>
                    </div>
                    <div class=" col-sm-6">
                        <div class="form-group">
                            {{Form::label('description', 'Donor description')}}
                            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'project description. e.g objectives'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::submit('Save donor', ['class'=>'btn btn-primary'])}}
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection