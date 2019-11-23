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
                    <i class="ace-icon fa fa-users"></i>
                    <a href="">Risks</a>
                </li>


            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="container-fluid">
                @include('layouts.messages')

                <div class="well col-sm-12">
                    <p style="font-weight: bold;">
                        {{$assumption->name}}
                    </p>
                    <br>

                    {!! Form::open(['action'=>'AssuptionsAfterController@store', 'method'=>'POST']) !!}
                    @csrf
                    <input type="hidden" name="assumption_id" value={{$id}}>
                    <div class="col-sm-8">
                        <div class="form-group">
                            {{Form::label('Occur', 'Did the assumption occur?')}}
                            <select name="occur" id="occur" class="form-control @error('occur') is-invalid @enderror">
                                <option value="Yes"> Yes</option>
                                <option value="No">No</option>

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('validated', 'Was the assumption validated?')}}
                            <select name="validated" id="validated"
                                class="form-control @error('validated') is-invalid @enderror">
                                <option value="Yes"> Yes</option>
                                <option value="No">No</option>

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('accessed', 'Assumption assesed through M&E?')}}
                            <select name="accessed" id="assesed"
                                class="form-control @error('assesed') is-invalid @enderror">
                                <option value="Yes"> Yes</option>
                                <option value="No">No</option>

                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('impact', 'Impact on the project')}}
                            {{Form::textarea('impact', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'impact'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('response', 'Response Strategy')}}
                            {{Form::textarea('response', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Response strategy'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::submit('Update Assumption', ['class'=>'btn btn-primary'])}}
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection