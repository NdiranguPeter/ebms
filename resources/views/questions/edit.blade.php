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
                <li class="active">Edit Question</li>
            </ul><!-- /.breadcrumb -->


        </div>
        <style>
            .form-group>label {
                color: #0081c3;
            }
        </style>

        <div class="page-content">

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">




                {!! Form::open(['action'=>['QuestionsController@update',$question->id], 'method'=>'POST']) !!}

                <input type="hidden" name="survey_id" value={{$question->survey_id}}>
                <input type="hidden" name="hint" value="">
                <input type="hidden" name="type" value={{$question->type}}>
                <input type="hidden" name="default" value="">
                <input type="hidden" name="in_order" value={{$question->qn_order+1}}>
                <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                {{Form::hidden('_method','PUT')}}
                <div class="col-xs-12 col-sm-6 table-bordered">
                    <div class="form-group">
                        {{Form::label('group', 'Group')}}
                        <select name="group_id" id="group"
                            class="form-control @error('ir_office') is-invalid @enderror">
                            @foreach ($groups as $group)
                            <option value={{$group->id}} @if ($question->group_id == $group->id)
                                selected
                                @endif>{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('column', 'Data column name')}}
                        {{Form::text('column',$question->column, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('required', 'Required')}}
                        <select name="mandatory" id="group"
                            class="form-control @error('ir_office') is-invalid @enderror">
                            @if ($question->mandatory == "yes")
                            <option value="yes" selected>Yes </option>
                            <option value="no">No</option>
                            @endif
                            @if ($question->mandatory == "no")
                            <option value="yes">Yes </option>
                            <option value="no" selected>No</option>
                            @endif

                        </select>
                    </div>

                    <div class="form-group">
                        {{Form::label('qn_order', 'Question order')}}
                        {{Form::number('qn_order',$question->qn_order, ['class' => 'form-control'])}}
                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 table-bordered">
                    <div class="form-group">
                        {{Form::label('name', 'Question')}}
                        {{Form::textarea('name', $question->name, ['id' => 'article-ckeditor', 'class' => 'form-control'])}}
                    </div>
                </div>
                <div style="float:right;">
                    {{Form::submit('Update Question', ['class'=>'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>


@endsection