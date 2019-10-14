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
                    <a href="">Resources</a>
                </li>
                /
                <li class="active"></li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row shw" style="padding:20px; ">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Resource</th>

                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($vs as $v)
                            <tr>
                                <td> {{$counter}} </td>
                                <td> {{$v->name}} </td>

                                <td>

                                </td>
                            </tr>
                            <?php $counter++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div style="min-height: 20px;"></div>


            </div>
        </div>
    </div>
</div>


@endsection