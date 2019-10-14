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
                <li class="active">Survey</li>
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
                    Surveys

                </h1>
                <a class="btn btn-primary" style="float:right;" href="/surveys/create">
                    <i class="ace-icon glyphicon glyphicon-plus"></i>
                    Add Survey
                </a>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">

                    @include('layouts.messages')
                    @if (count($surveys) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Survey name</th>
                                {{-- <th scope="col"> Description</th> --}}
                                <th scope="col"> Location</th>
                                <th scope="col">Created</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($surveys as $survey)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><a href="/surveys/{{$survey->id}}"> {{$survey->name}} </a>
                                </td>
                                {{-- <th scope="row">{{$survey->description}}</th> --}}
                                <th scope="row">{{$survey->location}}</th>

                                <td>{{$survey->created_at}}</td>
                                <td>
                                    <table class="acts">
                                        <tr>
                                            <td>
                                                <a class="green" href="/surveys/{{$survey->id}}">
                                                    <i class="ace-icon fa fa-eye bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="blue" href="/surveys/{{$survey->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="green" href="#">
                                                    <i class="ace-icon fa fa-clone bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="red" href="">
                                                    <i class="ace-icon fa fa-circle-o bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="blue" href="">
                                                    <i class="ace-icon fa fa-briefcase bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="red" href="#">
                                                    {!! Form::open(['action'=>['SurveysController@destroy',$survey->id],
                                                    'method'=>'POST'])
                                                    !!}

                                                    {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {!!Form::close()!!}
                                                </a>
                                            </td>

                                        </tr>
                                    </table>

                                </td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach

                        </tbody>
                    </table>
                    {{$surveys->links()}}
                    @else
                    <p>No Survey created yet</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
// show the alert
setTimeout(function() {
$(".alert").alert('close');
}, 1600);
});
</script>
@endsection