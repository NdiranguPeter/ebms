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
                <li class="active">Setings</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">

            <div class="page-header">
                <h1>
                    Settings

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                <style>
                    .sett td {
                        padding: 20px;
                    }
                </style>

                <div class="row">
                    <table class="sett">
                        <tr>
                            <td>
                                <a class="btn btn-success" href="/countries">
                                    <i class="ace-icon fa fa-globe bigger-130"> Countries</i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="#">
                                    <i class="ace-icon fa fa-gift bigger-130"> Distribution Items</i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="#">
                                    <i class="ace-icon fa fa-map-marker bigger-130"> Locations</i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/partners">
                                    <i class="ace-icon fa fa-users bigger-130"> Partners</i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="/currencies">
                                    <i class="ace-icon fa fa-money bigger-130"> Currencies</i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/sectors">
                                    <i class="ace-icon fa fa-list bigger-130"> Sectors</i>
                                </a>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <a class="btn btn-success" href="/donors">
                                    <i class="ace-icon fa fa-credit-card bigger-130"> Donors</i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/deliverables">
                                    <i class="ace-icon fa fa-flag bigger-130"> Deliverables</i>
                                </a>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection