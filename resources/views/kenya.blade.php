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
                    Kenya Dashboard
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <table class="table table-bordered">
                        <tr>
                            <th font-size:large;">Project name</th>
                            <th font-size:large;">Project status</th>
                            <th font-size:large;">Activities</th>
                            <th font-size:large;">Indicators</th>
                            <th font-size:large;"># of Beneficiaries</th>
                            <th font-size:large;">Budget (USD)</th>
                        </tr>
                        <tr>
                            <td><a href="#">Improved human rights fulfilment and gender
                                    equality in Wajir County of Kenya</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">17%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">42%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">59%</td>
                            <td style="font-weight: bold;">1,220</td>
                            <td style="font-weight: bold;">3,668,750</td>
                        </tr>
                        <tr>
                            <td><a href="#">Religious minorities in Kenya: overcoming divides,
                                    respecting rights</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">7%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">24%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">56%</td>
                            <td style="font-weight: bold;">6,140</td>
                            <td style="font-weight: bold;">2,056,122</td>
                        </tr>
                        <tr>
                            <td><a href="#">Conflict prevention & Peace Building Project</a>
                            </td>
                            <td style="background-color:green;font-weight: bold; color: white;">76%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">25%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">57%</td>
                            <td style="font-weight: bold;">1,271</td>
                            <td style="font-weight: bold;">7,823,758</td>
                        </tr>
                        <tr>
                            <td><a href="#">Strengthening Pastoralist Resilience to Climate
                                    Stress through Livestock Insurance & Agricultural</a></td>
                            <td style="background-color:yellow;font-weight: bold; color: white;">58%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">31%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">18%</td>
                            <td style="font-weight: bold;">1,019</td>
                            <td style="font-weight: bold;">3,148,167</td>
                        </tr>
                        <tr>
                            <td><a href="#">Integrated Community resilience Programme (ICReP)
                                    in Kenya</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">14%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">23%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">21%</td>
                            <td style="font-weight: bold;">1,330</td>
                            <td style="font-weight: bold;">1,946,324</td>
                        </tr>
                        <tr>
                            <td><a href="#">Sustainable Economic Empowerment for Drought
                                    Affected Communities (SEDAC) in Kilifi County</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">19%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">23%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">21%</td>
                            <td style="font-weight: bold;">1,330</td>
                            <td style="font-weight: bold;">1,946,324</td>
                        </tr>


                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection