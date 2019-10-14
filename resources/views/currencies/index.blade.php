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
                    <a href="/meal">MEAL</a>
                </li>
                /
                <li class="active">currencies</li>
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
                    currencies
                </h1>
            </div>

            @include('layouts.messages')
            <div class="container-fluid">

                <div class="row">

                    <a href="/currencies/create" class="btn btn-primary" style="float:right; margin-bottom: 2%;">
                        <i class="ace-icon glyphicon glyphicon-plus"></i>
                        Add currency
                    </a>

                    @if (count($currencies) > 0)
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background: #349ba7 !important;color: #fff;">
                                <th scope="col">ID</th>
                                <th scope="col">currency symbol</th>
                                <th scope="col">currency name</th>
                                <th scope="col">conversion rate</th>
                                <th>Created on</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($currencies as $currency)

                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><a href=""> {{$currency->symbol}} </a>
                                <td><a href=""> {{$currency->name}} </a>
                                <td><a href=""> {{$currency->rate}} </a>
                                </td>

                                <td>{{$currency->updated_at}}</td>
                                <td>
                                    <table class="acts">
                                        <tr>
                                            <td>
                                                <a class="green" href="/currencies/{{$currency->id}}">
                                                    <i class="ace-icon fa fa-eye bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                <a class="blue" href="/currencies/{{$currency->id}}/edit">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>

                                                </a>
                                            </td>
                                            <td>
                                                {!!
                                                Form::open(['action'=>['CurrenciesController@destroy',$currency->id],
                                                'method'=>'POST']) !!}

                                                {{Form::button('<i class="red ace-icon fa fa-trash-o"></i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                                {{Form::hidden('_method','DELETE')}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                    </table>


                                </td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach

                        </tbody>
                    </table>
                    {{$currencies->links()}}
                    @else
                    <p>No currency created yet</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>


@endsection