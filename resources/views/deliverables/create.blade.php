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
                    <a href="/deliverables">deliverables</a>
                </li>

            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Create project deliverable
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <div class=" col-sm-6">
                        {!! Form::open(['action'=>'DeliverablesController@store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Project deliverable')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'deliverable name'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::submit('Save deliverable', ['class'=>'btn btn-primary'])}}
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection