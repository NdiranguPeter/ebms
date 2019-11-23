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
                <li class="active">deliverables</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Activities deliverables
                </h1>
            </div>

            @include('layouts.messages')
            <div class="container-fluid">

                <div class="row">

                    <a href="/deliverables/create" class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add deliverable
                    </a>

                    @if (count($deliverables) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">deliverable name</th>
                                <th>Created on</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($deliverables as $deliverable)

                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><a href="/deliverables/{{$deliverable->id}}"> {{$deliverable->name}} </a>
                                </td>

                                <td>{{$deliverable->updated_at}}</td>
                                <td>
                                    <table class="acts">
                                        <tr>
                                            <td>
                                                <a class="green" href="/deliverables/{{$deliverable->id}}">
                                                    <i class="ace-icon fa fa-eye bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="blue" href="/deliverables/{{$deliverable->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                {!!
                                                Form::open(['action'=>['DeliverablesController@destroy',$deliverable->id],
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
                    {{$deliverables->links()}}
                    @else
                    <p>No deliverable created yet</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>


@endsection