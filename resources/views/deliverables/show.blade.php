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
                    <a href="/projects">Projects</a>
                </li>
                /
                <li class="active">Create project</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <div class=" col-sm-6">
                        <h1>
                            {{$deliverable->name}}
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection