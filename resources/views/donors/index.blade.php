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
                <li class="active">donors</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    donors
                </h1>
            </div>

            @include('layouts.messages')
            <div class="container-fluid">

                <div class="row">

                    <a href="/donors/create" class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add donor
                    </a>

                    @if (count($donors) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">donor name</th>
                                <th>Created on</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($donors as $donor)

                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><a href="#"> {{$donor->name}} </a>
                                </td>

                                <td>{{$donor->updated_at}}</td>
                                <td>
                                    <table class="acts">
                                        <tr>
                                            <td>
                                                <a class="green" href="#">
                                                    <i class="ace-icon fa fa-eye bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="blue" href="/donors/{{$donor->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                {!! Form::open(['action'=>['DonorsController@destroy',$donor->id],
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
                    {{$donors->links()}}
                    @else
                    <p>No donor created yet</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>


@endsection