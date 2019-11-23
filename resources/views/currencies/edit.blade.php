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
                    <a href="/currencys">currencys</a>
                </li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Edit project currency
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <div class=" col-sm-6">
                        {!! Form::open(['action'=>['CurrenciesController@update',$currency->id], 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Currency name')}}
                            {{Form::text('name', $currency->name, ['class' => 'form-control', 'placeholder' => 'currency name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('symbol', 'Currency symbol')}}
                            {{Form::text('symbol', $currency->symbol, ['class' => 'form-control', 'placeholder' => 'symbol'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('rate', 'Conversion rate (value equivalent to 1 GBP)')}}
                            {{Form::text('rate', $currency->rate, ['class' => 'form-control', 'placeholder' => 'currency name'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update currency', ['class'=>'btn btn-primary'])}}
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection