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
                <li class="active">Risks</li>
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
                    Risks List

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">

                    <?php 
                   
                      if(isset($goal)){
                        //   $txt = 'Goal ID';
                        //   $vsf = 'goal_id';
                          $message = 'No goal risks registered yet.';
                          $url = '/risks/goal/create/';
                            }
                      if(isset($outcome)){
                    // $txt = 'Outcome ID';
                    // $vsf = 'outcome_id';
                    $message = 'No outcome risks registered yet.';
                    $url = '/risks/outcome/create/';
                                        }
                    if(isset($output)){
                //     $txt = 'Output ID';
                //    $vsf = 'output_id';
                   $message = 'No output risks registered yet.';
                   $url = '/risks/output/create/';
                    }
                    if(isset($activity)){
                    // $txt = 'Activity ID';
                    // $vsf = 'activity_id';
                    $message = 'No activity risks registered yet.';
                    $url = '/risks/activity/create/';
                    
                    }
                   ?>
                    <a href="/logframe/{{$project->id}}" class="btn btn-default" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Back to logic model
                    </a>
                    <a href="{{$url}}{{$project->id}}" class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add Risk
                    </a>
                    @if (count($risks)>0)

                    <table class="table table-bordered">
                        <tr style="background: #349ba7 !important;color: #fff;">
                            <th>#</th>
                            {{-- <th> {{$txt}} </th> --}}
                            <th>Name</th>
                            <th>Category</th>
                            <th>Level</th>
                            <th>Likelihood</th>
                            <th>Impact</th>
                            <th>Description</th>
                            <th>Response</th>
                            <th>Strategy</th>
                            <th>Owner</th>
                            <th>action</th>
                        </tr>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($risks as $risk)

                            <tr style="font-size: x-small;">
                                <td> {{$count}} </td>
                                {{-- <td> {{$risk->$vsf}} </td> --}}
                                <td> {{$risk->name}} </td>
                                <td> {{$risk->category}} </td>
                                <td>{{$risk->level}} </td>
                                <td> {{$risk->likelihood}}</td>
                                <td>{{$risk->impact}} </td>
                                <td>{!!$risk->description!!} </td>
                                <td>{{$risk->response}} </td>
                                <td> {{$risk->strategy}}</td>
                                <td>{{$risk->owner}} </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding:10px;">
                                                <a class="green" href="#">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            </td>
                                            <td style="padding:10px;">
                                                {!!
                                                Form::open(['action'=>['RisksController@destroy',$risk->id],
                                                'method'=>'POST']) !!}

                                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                                {{Form::hidden('_method','DELETE')}}
                                                {!!Form::close()!!}
                                            </td>
                                            {{-- <td style="padding:10px;">
                                                <a class="green" href="#">
                                                    <i class="ace-icon fa fa-refresh bigger-130">before</i>
                                                </a>
                                            </td> --}}
                                            <td style="padding:10px;">
                                                <a class="blue" href="/risksafter/{{$risk->id}}">
                                                    <i class="ace-icon fa fa-refresh bigger-130">after</i>
                                                </a>
                                            </td>

                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>


                    @else
                    <p>
                        {{$message}}
                    </p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>


@endsection