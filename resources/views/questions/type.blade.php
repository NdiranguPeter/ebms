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
                @include('layouts.messages')
                <span style="font-weight: bold; font-size: large;"> {!!$question->name!!} </span>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                {!! Form::open(['action'=>['QuestionsController@storeType',$question->id], 'method'=>'POST']) !!}
                <input type="hidden" name="qn_id" value={{$question->id}}>
                <input type="hidden" name="survey_id" value={{$question->survey_id}}>
                <div><span>Options</span> <span style="margin-left: 13%;">Values</span></div>

                <div id="boxes-wrap">

                    <div style="margin-top: 10px;">

                        <input name="name[]" type="text" class="name" placeholder="option 1">

                        <input name="value[]" type="number" class="value" value=1>
                        <button class="remove-gas-row" type="button">Remove</button>

                    </div>
                </div>

                <div style="margin-top: 10px;">
                    <a href="#" id="add">Click to add option <i class="ace-icon glyphicon glyphicon-plus"></i></a>
                    {{Form::submit('Save Options', ['class'=>'btn btn-primary','style'=>'margin-left: 30%;'])}}
                </div>
                {!! Form::close() !!}

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
newRow.find('input.value').attr('value', inputCount);
boxesWrap.append(newRow);
});

$('#boxes-wrap').on('click', 'button.remove-gas-row', function () {
$(this).parent().remove();
});
});
</script>

@endsection