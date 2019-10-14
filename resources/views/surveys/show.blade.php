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
                    <a href="/surveys">Surveys</a>
                </li>
                /
                <li class="active">{{$survey->name}}</li>
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
                    {{$survey->name}}
                </h1>



            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                <div style="float:right;">
                    <table>
                        <tr>
                            <td><a href="#">data</a> | </td>
                            <td><a href="#">archive</a> | </td>
                            <td><a href="/surveys/{{$survey->id}}/edit">edit</a> | </td>
                            <td>
                                {!! Form::open(['action'=>['SurveysController@destroy',$survey->id], 'method'=>'POST'])
                                !!}
                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}
                                {{Form::hidden('_method','DELETE')}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    </table>


                </div>

                <div class="row shw" style="padding:20px; border: 1px solid #2da0ef;">


                    <p><b>Country: </b>{{$country->name}}</p>
                    <p><b>Location: </b>{{$survey->location}}</p>
                    <p><b>Supervisor: </b>{{$survey->supervisor}}</p>
                    <p><b>Description: </b>{!!$survey->description!!}</p>
                    <hr>
                    <p>Created: <small>{{$survey->created_at}}</small></p>



                </div>
                <div style="min-height: 20px;"></div>
                <a class="btn btn-default" style="float:left;" href="/surveys">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Back to surveys
                </a>
                <a class="btn btn-primary" style="float:right;" href="/questions/{{$survey->id}}">
                    <i class="ace-icon fa fa-arrow-circle-o-right"></i>
                    Survey Quetions
                </a>

            </div>
        </div>
    </div>
</div>


@endsection