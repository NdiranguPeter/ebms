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
                <li class="active">Assumptions</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Assumptions List

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <?php 
                   
                      if(isset($goal)){
                        //   $txt = 'Goal ID';
                        //   $vsf = 'goal_id';
                          $message = 'No goal assumptions registered yet.';
                          $url = '/assumptions/goal/create/';
                            }
                      if(isset($outcome)){
                    // $txt = 'Outcome ID';
                    // $vsf = 'outcome_id';
                    $message = 'No outcome assumptions registered yet.';
                    $url = '/assumptions/outcome/create/';
                                        }
                    if(isset($output)){
                //     $txt = 'Output ID';
                //    $vsf = 'output_id';
                   $message = 'No output assumptions registered yet.';
                   $url = '/assumptions/output/create/';
                    }
                    if(isset($activity)){
                    // $txt = 'Activity ID';
                    // $vsf = 'activity_id';
                    $message = 'No activity assumptions registered yet.';
                    $url = '/assumptions/activity/create/';
                    
                    }
                   ?>
                    <a href="/logframe/{{$project->id}}" class="btn btn-default" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Back to logic model
                    </a>
                    <a href="{{$url}}{{$project->id}}" class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add assumption
                    </a>
                    @if (count($assumptions)>0)

                    <table class="table table-bordered">
                        <tr style="background: #349ba7 !important;color: #fff;">
                            <th>#</th>
                            {{-- <th> {{$txt}} </th> --}}
                            <th> Reason</th>
                            <th>Validation</th>
                            <th>Impact Description</th>
                            <th>Response Strategy</th>
                            <th>Owner</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($assumptions as $assumption)

                            <tr style="font-size: x-small;">
                                <td> {{$count}} </td>
                                {{-- <td> {{$assumption->$vsf}} </td> --}}
                                <td> {{$assumption->reason}} </td>
                                <td>{{$assumption->validation}} </td>
                                <td> {{$assumption->description}}</td>
                                <td>{{$assumption->response}} </td>
                                <td>{{$assumption->owner}} </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="padding:10px;">
                                                <a class="green" href="/assumptions/{{$assumption->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            </td>
                                            <td style="padding:10px;">
                                                {!!
                                                Form::open(['action'=>['AssumptionsController@destroy',$assumption->id],
                                                'method'=>'POST']) !!}

                                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                                {{Form::hidden('_method','DELETE')}}
                                                {!!Form::close()!!}
                                            </td>

                                            <td style="padding:10px;">
                                                <a class="blue" href="/assumptionsafter/{{$assumption->id}}">
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