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
                <li class="active">{{$project->name}}</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Outcomes

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">


                    <a href="/logframe/{{$project->id}}" class="btn btn-default" style="float:left; margin-bottom: 2%;">
                        <i class="ace-icon fa fa-arrow-circle-o-left"></i>
                        Back to logic model
                    </a>
                    <a data-toggle="modal" data-target="#selectOutcome" class="btn btn-primary"
                        style="margin-right:3px; float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add output
                    </a>
                    <a data-toggle="modal" data-target="#selectOutcome2" class="btn btn-success"
                        style="margin-right:3px; float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add indicator
                    </a>
                    <a href="/outcomes/create/{{$project->id}}" class="btn btn-primary"
                        style="margin-right:3px; float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add Outcome
                    </a>
                    @include('layouts.messages')

                    @if (count($outcomes) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">Outcome</th>
                                <th scope="col">Created</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($outcomes as $outcome)
                            <tr style="font-size: smaller;">
                                <th scope="row">{{$i}}</th>
                                <td scope="row"><a href="/outputs/{{$outcome->id}}">{!!$outcome->name!!}</a></td>
                                <td scope="row">{!!$outcome->created_at!!}</td>
                                <td scope="row">
                                    <table>
                                        <tr>
                                            <td style="padding:10px;">
                                                <a class="green" href="#">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            </td>
                                            <td>
                                                {!!
                                                Form::open(['action'=>['OutcomesController@destroy',$outcome->id],'method'=>'POST'])
                                                !!}

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

                    @else
                    <p>No project outcomes created yet</p>
                    @endif

                </div>

                <div class="modal fade" id="selectOutcome" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select outcome</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($outcomes)>0)
                                <table class="table table-bordered">

                                    @foreach ($outcomes as $outcome)

                                    <tr>
                                        <td><a href="/outputs/create/{{$outcome->id}}">{!!$outcome->name!!}</a></td>
                                    </tr>

                                    @endforeach
                                </table>
                                {{-- {{$outcomes->links()}} --}}
                                @else
                                <a href="/outcomes/create/{{$project->id}}">Create a outcome</a>
                                @endif

                            </div>
                            <div class="modal-footer">
                                <a href="/outcomes/create/{{$project->id}}">Create a outcome</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="selectOutcome2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select outcome</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($outcomes)>0)
                                <table class="table table-bordered">

                                    @foreach ($outcomes as $outcome)

                                    <tr>
                                        <td><a
                                                href="/indicators/outcome/create/{{$outcome->id}}">{!!$outcome->name!!}</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </table>
                                {{-- {{$outcomes->links()}} --}}
                                @else
                                <a href="/outcomes/create/{{$project->id}}">Create a outcome</a>
                                @endif

                            </div>
                            <div class="modal-footer">
                                <a href="/outcomes/create/{{$project->id}}">Create a outcome</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection