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
                <li class="active">Monthly Peformance Report</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Monthly Peformance Report
                </h1>
                <p style="float:right;">Date: @php
                    $mytime = new DateTime();
                    echo $mytime->format('Y-m-d');
                    @endphp

                </p>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="col-sm-12">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="col-sm-12">
                        <form method="post" action="{{url('sendemail/send')}}">
                            {{ csrf_field() }}
                            <div class="form-group col-sm-6">
                                <label>Staff Name</label>
                                <input type="text" name="name" class="form-control" value="" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Job Title</label>
                                <input type="text" name="title" class="form-control" value="" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Country/Department</label>
                                <input type="text" name="department" class="form-control" value="" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Line Manager</label>
                                <input type="text" name="manager" class="form-control" value="" />
                            </div>

                            <div class="form-group col-sm-12">
                                <label><b>Key Achievements/Tasks Completed</b> <i>(Endeavour to discuss your
                                        achievements and
                                        completed tasks in the context of your performance/development objectives
                                        and/or the organisational strategy.)</i></label>
                                <textarea name="achievements" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>Key Challenges and Proposed Solutions/Need for Support</b> </label>
                                <textarea name="challenges" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-info" value="Send" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>



@endsection