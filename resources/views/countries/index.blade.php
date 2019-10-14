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
                    <a href="/settings">settings</a>
                </li>
                /
                <li class="active">Countries</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                            autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Countries

                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">

                    <a class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Edit Country
                    </a>

                    @if (count($countries) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Country name</th>
                                <th scope="col">Created</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                            <tr>
                                <th scope="row">{{$country->id}}</th>
                                <td><a href="/countries/{{$country->id}}"> {{$country->name}} </a>
                                </td>
                                <td>{{$country->created_at}}</td>
                                <td>
                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-eye bigger-130"></i>
                                        View
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="blue" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        Edit
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        Delete
                                    </a>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    @else
                    <p>No country created yet</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>


@endsection