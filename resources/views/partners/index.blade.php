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
                <li class="active">partners</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    partners

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">

                    <a href="/partners/create" class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add partner
                    </a>


                    @include('layouts.messages')
                    @if (count($partners) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Partner name</th>
                                <th scope="col"> Acronym</th>
                                <th scope="col"> Type</th>
                                <th scope="col">Role</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">email</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($partners as $partner)

                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><a href="/partners/{{$partner->id}}"> {{$partner->name}} </a>
                                </td>
                                <td scope="row">{{$partner->acronym}}</td>
                                <td scope="row">{{$partner->type}}</td>
                                <td scope="row">{{$partner->role}}</td>
                                <td scope="row">{{$partner->address}}</td>
                                <td scope="row">{{$partner->phone}}</td>
                                <td scope="row">{{$partner->email}}</td>
                                <td scope="row">{{$partner->description}}</td>
                                <td>{{$partner->created_at}}</td>
                                <td>
                                    <table class="acts">
                                        <tr>
                                            <td>
                                                <a class="green" href="/partners/{{$partner->id}}">
                                                    <i class="ace-icon fa fa-eye bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="blue" href="/partners/{{$partner->id}}/edit">
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


                                </td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach

                        </tbody>
                    </table>
                    {{$partners->links()}}
                    @else
                    <p>No partner created yet</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>


@endsection