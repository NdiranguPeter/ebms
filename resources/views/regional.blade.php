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
                <li class="active">Dashboard</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Regional Dashboard
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <table class="table table-bordered">
                        <tr style="font-weight:bold;">
                            <td>Country</td>
                            <td>Project status</td>
                            <td>beneficiaries</td>
                            <td>Value</td>
                            <td>Budget</td>
                        </tr>

                        @foreach ($countries as $country)
                        <tr>
                            <td>{{$country->name}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection