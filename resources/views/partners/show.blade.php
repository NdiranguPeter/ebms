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
                    <a href="/partners">partners</a>
                </li>
                /
                <li class="active">{{$partner->name}}</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    {{$partner->name}}
                </h1>
                <div style="float:right;">

                    <table>
                        <tr>
                            <td style="padding:10px;">
                                <a class="green" href="/partners/{{$partner->id}}/edit">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['action'=>['PartnersController@destroy',$partner->id],
                                'method'=>'POST']) !!}

                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                {{Form::hidden('_method','DELETE')}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    </table>

                </div>


            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                <a href="#">Download</a>
                <div class="row shw" style="padding:20px; border: 1px solid #2da0ef;">

                    <div class="col-sm-6">
                        <p><b>Name: </b>{{$partner->name}}</p>
                        <p><b>Acronym: </b>{{$partner->acronym}}</p>
                        <p><b>Type: </b>{{$partner->type}}</p>
                        <p><b>Role: </b>{{$partner->role}}</p>
                        <p><b>Address: </b>{{$partner->address}}</p>
                        <p><b>Phone: </b>{{$partner->phone}}</p>
                        <p><b>Email: </b>{{$partner->email}}</p>
                    </div>

                    <div class="col-sm-12">
                        <hr>
                        <p><b>Descrption: </b>{!!$partner->description!!}</p>
                        <hr>
                        <p>Created: <small>{{$partner->created_at}}</small></p>
                    </div>
                </div>
                <div style="min-height: 20px;"></div>
                <a class="btn btn-default" style="float:left;" href="/partners">
                    <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                    Back to partners
                </a>

            </div>
        </div>
    </div>
</div>


@endsection