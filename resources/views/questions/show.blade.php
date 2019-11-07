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
                    <i class="ace-icon fa fa-folder"></i>
                    <a href="/surveys">Surveys</a>
                </li>
                /
                <li class="active">{{$survey->name}}</li>
            </ul><!-- /.breadcrumb -->


        </div>
        <style>
            .form-group>label {
                color: #0081c3;
            }

            .qns {
                width: 350px;
            }
        </style>

        <div class="page-content">

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="col-xs-12 col-sm-6 table-bordered" style="margin-top: 25px; padding: 10px;">
                    {!! Form::open(['action'=>'QuestionsController@store', 'method'=>'POST']) !!}
                    <input type="hidden" name="survey_id" value={{$survey->id}}>
                    <input type="hidden" name="hint" value="">
                    <input type="hidden" name="qn_order" value={{$qn_order+1}}>
                    <input type="hidden" name="default" value="">
                    <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                    <div class="form-group">
                        <a style="float:right;" data-toggle="modal" data-target="#exampleModal">Create or Delete
                            group</a>
                        {{Form::label('group', 'Group')}}
                        <select name="group_id" id="group"
                            class="form-control @error('ir_office') is-invalid @enderror">
                            <option value=0 selected>choose question category</option>
                            @foreach ($groups as $group)
                            <option value={{$group->id}}>{{$group->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Question')}}
                        {{Form::textarea('name', '', [ 'class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('type', 'Question type')}}
                        <select name="type" id="group" class="form-control @error('ir_office') is-invalid @enderror">
                            <option value="text">Text </option>
                            <option value="integer">Number</option>
                            <option value="decimal">Decimal</option>
                            <option value="radio">Select one</option>
                            <option value="checkbox">Select multiple</option>
                            <option value="date">Date</option>
                            <option value="time">Time</option>
                            {{-- <option value="photo">Photo</option>
                            <option value="audio">Audio</option>
                            <option value="video">Video</option> --}}
                            <option value="note">Note</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('column', 'Data column name')}}
                        {{Form::text('column','', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('required', 'Required')}}
                        <select name="mandatory" id="group"
                            class="form-control @error('ir_office') is-invalid @enderror">
                            <option value="" selected>Is the question mandatory?</option>
                            <option value="yes">Yes </option>
                            <option value="no">No</option>

                        </select>
                    </div>

                    <div style="float:right;">
                        {{Form::submit('Create Question', ['class'=>'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}

                </div>
                @if ($questions->count()>0)

                <div class="col-xs-12 col-sm-6">
                    <h1 style="font-size: 18px;color: #0081c3;">{{$survey->name}}</h1>
                    @foreach ($grouped_questions as $grouped_qn)
                    @foreach ($groups as $group)
                    @if ($group->id == $grouped_qn->group_id )
                    <p>{{$group->name}}</p>
                    @endif
                    @endforeach

                    <table class="table table-bordered">
                        @foreach ($questions as $question)
                        @if ($grouped_qn->group_id == $question->group_id)

                        <tr>
                            <td>{{$question->qn_order}}</td>
                            <td class="qns">{!!$question->name!!}</td>
                            <td>


                                <a href="" data-toggle="modal" data-target="#skipModal"><i
                                        class="ace-icon glyphicon glyphicon-cog"></i></a>
                                &nbsp;
                                <a href="/questions/{{$question->id}}/delete"
                                    onclick="return confirm('Are you sure you want to delete?')"> <i
                                        class="red ace-icon glyphicon glyphicon-trash"></i></a>&nbsp;&nbsp;
                                <a href="/questions/{{$question->id}}/edit"> <i
                                        class="ace-icon glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
                                <a href="/questions/{{$question->id}}/duplicate"
                                    onclick="return confirm('Are you sure you want to duplicate?')"> <i
                                        class="green ace-icon glyphicon glyphicon-duplicate"></i></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    </table>
                    @endforeach
                    {{$questions->links()}}


                </div>



                @else

                <div class="col-xs-12 col-sm-6 alert alert-success">
                    <p>This survey currently doesnt have any questions</p>
                </div>

                @endif


            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create questions group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    @foreach ($groups as $group)
                    <tr>
                        <td>{{$group->name}}</td>
                        <td>
                            <a href="/groups/{{$group->id}}/delete"
                                onclick="return confirm('Are you sure you want to delete?')"> <i
                                    class="red ace-icon glyphicon glyphicon-trash"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                    @endforeach
                </table>

                <hr>

                {!! Form::open(['action'=>'GroupsController@store', 'method'=>'POST']) !!}

                <input type="hidden" name="survey_id" value={{$survey->id}}>
                {{Form::label('name', 'Group name')}}
                {{Form::text('name','', ['class' => 'form-control'])}}

            </div>

            <div class="modal-footer">
                {{Form::submit('Save', ['class'=>'btn btn-primary right'])}}

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="skipModal" tabindex="-1" role="dialog" aria-labelledby="skipModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="skipModalLabel">Skip logic</h4>
            </div>
            <div class="modal-body">
                <p style="font-weight:bold;">This question will only be displayed if the following conditions apply</p>
                <br />
                <select name="" id="" style="min-width: 300px;">
                    <option value="">select question from list</option>
                    @foreach ($radioquestions as $radioquestion)
                    <option value="">{!!$radioquestion->name!!}</option>
                    @endforeach
                    @foreach ($checkboxquestions as $checkboxquestions)
                    <option value="">{!!$checkboxquestions->name!!}</option>
                    @endforeach
                </select>
                &nbsp;
                &nbsp;
                &nbsp;
                <select name="" id="">
                    <option value="">=</option>
                </select>
                &nbsp;
                &nbsp;
                &nbsp;
                <select name="" id="" style="min-width: 150px;">
                    <option value="">select value</option>
                    @foreach ($questionsanswers as $questionsanswer)
                    <option value="">{{$questionsanswer->ans}}</option>
                    @endforeach
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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