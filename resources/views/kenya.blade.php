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
                        <tr>
                            <td><a href="#">Improved human rights fulfilment and gender
                                    equality in Wajir County of Kenya</a></td>
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
                        <tr>
                            <td><a href="#">Religious minorities in Kenya: overcoming divides,
                                    respecting rights</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">7%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">24%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">56%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">822</td>
                                        <td style="font-weight: bold; padding-left: 122px;">900</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">2,056,122</td>
                            <td style="background-color:yellow;font-weight: bold; color: white;">32%</td>
                        </tr>
                        <tr>
                            <td><a href="#">Conflict prevention & Peace Building Project</a>
                            </td>
                            <td style="background-color:green;font-weight: bold; color: white;">76%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">25%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">57%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">560</td>
                                        <td style="font-weight: bold; padding-left: 122px;">400</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">7,823,758</td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">57%</td>
                        </tr>
                        <tr>
                            <td><a href="#">Strengthening Pastoralist Resilience to Climate
                                    Stress through Livestock Insurance & Agricultural</a></td>
                            <td style="background-color:yellow;font-weight: bold; color: white;">58%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">31%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">18%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">837</td>
                                        <td style="font-weight: bold; padding-left: 122px;">590</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">3,148,167</td>
                            <td style="background-color:green;font-weight: bold; color: white;">83%</td>
                        </tr>
                        <tr>
                            <td><a href="#">Integrated Community resilience Programme (ICReP)
                                    in Kenya</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">14%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">23%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">21%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">706</td>
                                        <td style="font-weight: bold; padding-left: 122px;">605</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">1,946,324</td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">64%</td>
                        </tr>
                        <tr>
                            <td><a href="#">Sustainable Economic Empowerment for Drought
                                    Affected Communities (SEDAC) in Kilifi County</a></td>
                            <td style="background-color:red;font-weight: bold; color: white;">19%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">23%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">21%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">906</td>
                                        <td style="font-weight: bold; padding-left: 122px;">1205</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">1,946,324</td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">62%</td>
                        </tr>


                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection