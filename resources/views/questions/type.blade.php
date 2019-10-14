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
                <li class="active">Add Question options</li>
            </ul><!-- /.breadcrumb -->


        </div>
        <style>
            .form-group>label {
                color: #0081c3;
            }
        </style>

        <div class="page-content">
            <div class="container-fluid">

                <p style="font-size:medium; font-weight:bold;">{!!$question->name!!}</p>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                {!! Form::open(['action'=>['QuestionsController@storeType',$question->id], 'method'=>'POST']) !!}
                <input type="hidden" name="qn_id" value={{$question->id}}>
                <input type="hidden" name="survey_id" value={{$question->survey_id}}>
                <div id="boxes-wrap">
                    <div>

                        <input name="name[]" type="text" class="name" placeholder="option 1">
                        <button class="remove-gas-row" type="button">Remove</button>
                    </div>
                </div>

                <div style="float:right;">
                    {{Form::submit('Save Options', ['class'=>'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}

                <a href="#" id="add">Add More options <i class="ace-icon glyphicon glyphicon-plus"></i></a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
var boxesWrap = $('#boxes-wrap');
var boxRow = boxesWrap.children(":first");
var boxRowTemplate = boxRow.clone();
boxRow.find('button.remove-gas-row').remove();

// nb can't use .length for inputCount as we are dynamically removing from middle of collection
var inputCount = 1;

$('#add').click(function () {
var newRow = boxRowTemplate.clone();
inputCount++;
newRow.find('input.name').attr('placeholder', 'option '+inputCount);
boxesWrap.append(newRow);
});

$('#boxes-wrap').on('click', 'button.remove-gas-row', function () {
$(this).parent().remove();
});
});
</script>

@endsection