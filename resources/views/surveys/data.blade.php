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


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{$survey->name}}
                </h1>

               <div style="float:right;margin-top: -20px;">
                <a class="btn btn-primary" href="#">Table</a>
                   <a  class="btn btn-light" href="/export_excel/excel/{{$survey->id}}"><i class="fa fa-file-excel-o blue" aria-hidden="true"></i></a>
               </div>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">

                    @include('layouts.messages')
                    @if (count($answers) > 0)
                    <table class=" table-hover table-bordered">
                        <thead>
                            <tr>
                                @foreach ($answers_list as $answer_list)

                                <th scope="col" style="padding: 10px;">
                                    @foreach ($questions as $question)
                                    @if ($question->id == $answer_list->qn_id)
                                    {{$question->column}}
                                    @endif
                                    @endforeach
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($answers_list as $answer_list)
                                <td>
                                    <table class="table">
                                        @foreach ($answers as $answer)
                                        @if ($answer->qn_id == $answer_list->qn_id)
                                        <tr>

                                            @if ($answer->ans == null)
                                            <td>null</td>
                                            @else
                                            <td>
                                                {{$answer->ans}}
                                            </td>
                                            @endif

                                        </tr>
                                        @endif
                                        @endforeach
                                    </table>
                                </td>
                                @endforeach
                            </tr>
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
}, 3600);
});
</script>
@endsection