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

                <p style="font-weight:bold;">This question will only be displayed if the following conditions apply</p>
                <br />
                {!! Form::open(['action'=>'SkipController@store', 'method'=>'POST']) !!}
                <input type="text" name="qnid" value="">
                <select id='questions' name='questions' style="min-width: 300px;">
                    <option value="">select question from list</option>
                    @foreach ($radioquestions as $radioquestion)
                    <option value={{$radioquestion->id}}>{!!$radioquestion->name!!}</option>
                    @endforeach
                    @foreach ($checkboxquestions as $checkboxquestions)
                    <option value={{$checkboxquestions->id}}>{!!$checkboxquestions->name!!}</option>
                    @endforeach
                </select>
                &nbsp;
                &nbsp;
                &nbsp;
                <select name="operator" id="operator">
                    <option value="=" selected>=</option>
                </select>
                &nbsp;
                &nbsp;
                &nbsp;
                <select id='options' name='options' style="min-width: 150px;">
                    <option value="">select value</option>

                </select>

            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {

$('select[name="questions"]').on('change', function(){
var qnId = $(this).val();

if(qnId) {
$.ajax({
url: '/options/'+qnId,
type:"GET",
dataType:"json",
beforeSend: function(){
$('#loader').css("visibility", "visible");
},

success:function(data) {

$('select[name="options"]').empty();

$.each(data, function(key, value){

$('select[name="options"]').append('<option value="'+ value +'">' + value + '</option>');

});
},
complete: function(){
$('#loader').css("visibility", "hidden");
}
});
} else {
$('select[name="answers"]').empty();
}

});

});
</script>

@endsection