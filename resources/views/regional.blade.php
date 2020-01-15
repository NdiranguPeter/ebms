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
                        <tr>
                            <th style="font-weight:bold; font-size:large;">Country</th>
                            <th style="font-weight:bold; font-size:large;">Project status</th>
                            <th style="font-weight:bold; font-size:large;">Activities</th>
                            <th style="font-weight:bold; font-size:large;">Indicators</th>
                            <th style="font-weight:bold; font-size:large;"># of Beneficiaries</th>
                            <th style="font-weight:bold; font-size:large;">Budget (USD)</th>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;"><a href="/kenya">Kenya</a></td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">67%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">42%</td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">59%</td>
                            <td style="font-weight: bold;">8,750</td>
                            <td style="font-weight: bold;">13,668,750</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;"><a href="#">Somalia</a></td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">70%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">24%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">56%</td>
                            <td style="font-weight: bold;">6,140</td>
                            <td style="font-weight: bold;">2,056,122</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;"><a href="#">Ethiopia</a></td>
                            <td style="background-color:green;font-weight: bold; color: white;">81%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">25%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">57%</td>
                            <td style="font-weight: bold;">6,271</td>
                            <td style="font-weight: bold;">27,823,758</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;"><a href="#">Sudan</a></td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">58%</td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">31%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">18%</td>
                            <td style="font-weight: bold;">7,019</td>
                            <td style="font-weight: bold;">32,148,167</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;"><a href="#">South Sudan</a></td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">64%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">23%</td>
                            <td style="background-color:red;font-weight: bold; color: white;">21%</td>
                            <td style="font-weight: bold;">6,330</td>
                            <td style="font-weight: bold;">11,946,324</td>
                        </tr>


                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection