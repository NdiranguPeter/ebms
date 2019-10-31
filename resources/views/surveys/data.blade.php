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
            </ul>

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

                <div class="row">

                    @include('layouts.messages')
                    @if (count($answers) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>

                            <tr>
                                @foreach ($questions as $question)
                                <th scope="col">{{$question->column}}</th>

                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answers as $answer)

                            <tr>
                                @foreach ($questions as $question)
                                @if ($answer->qn_id == $question->id)
                                <td>{{$answer->ans}}</td>
                                @endif
                                @else
                                <td></td>
                                @endforeach
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @else
                    <p>Survey doesn't have data yet</p>
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