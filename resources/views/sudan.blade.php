@extends('layouts.default')
@section('content')
<div class="container-fluid main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="list-inline">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
             <a href="/admin">Admin</a>
                    </li>
                    /
                    <li>
                        <a href="/regional">Regional</a>
                    
                    </li>
                /
                <li class="active">Sudan</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Sudan Dashboard
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <table class="table table-bordered">
                        <tr>
                            <th rowspan="1">Project name</th>
                            <th rowspan="1">Project status</th>
                            <th rowspan="1">Process(Activities)</th>
                            <th rowspan="1">Results(Outputs)</th>
                            <th rowspan="1" style="font-weight:bold; font-size:medium;">
                                <table>
                                    <tr>
                                        <td>Beneficiaries Data</td>

                                    </tr>
                                    <tr>
                                        <td style="border-top:1px solid #ddd;">Male</td>
                                        <td style="border-left:1px solid #ddd; border-top:1px solid #ddd;">Female</td>
                                    </tr>
                                </table>
                            </th>
                            <th rowspan="1">Budget (USD)</th>
                            <th rowspan="1">Budget Use</th>
                        </tr>
                        @foreach ($projects as $project)
                        <tr>
                            <td><a href="/reports/{{$project->id}}">{{$project->name}}</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">17%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">42%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">59%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">756</td>
                                        <td style="font-weight: bold; padding-left: 122px;">650</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">3,668,750</td>
                            <td style="background-color:red;font-weight: bold; color: white;">20%</td>
                        </tr>
                        @endforeach
                        
                        
                        </table>
                        {{$projects->links()}}

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection