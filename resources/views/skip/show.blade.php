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
                <li class="active">Set Question logic</li>
            </ul><!-- /.breadcrumb -->


        </div>
        <style>
            .form-group>label {
                color: #0081c3;
            }
        </style>

        <div class="page-content">
            @include('layouts.messages')
            <div class="container-fluid">
                <div class="col-sm-12">
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                            <li class="active">
                                <a data-toggle="tab" href="#skip">Skip logic</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#summation">Calculation</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#more">More</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="skip" class="tab-pane in active">

                                <p style="font-weight:bold;">This question will only be displayed if the following
                                    conditions apply</p>
                                <br />
                                {!! Form::open(['action'=>'SkipController@store', 'method'=>'POST']) !!}
                                <input type="hidden" name="qnid" value={{$question->id}}>
                                <select id='questions' name='questions' style="min-width: 300px;">
                                    <option value="">select question from list</option>
                                    @foreach ($questions as $question)
                                    <option value={{$question->id}}>{!!$question->name!!}</option>
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

                                {{Form::submit('Save', ['class'=>'btn btn-primary','style'=>'float:right;'])}}

                                {!! Form::close() !!}
                            </div>

                            <div id="summation" class="tab-pane">
                                <p>summation logic here</p>
                            </div>

                            <div id="more" class="tab-pane">
                                <p>coming soon</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

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