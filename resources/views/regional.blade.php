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
                <li class="active">Dashboard</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Regional Dashboard
                </h1>
               <div style="float:right; margin-top: -20px;">
                   <a href="/regional/2018" class="btn {{ (request()->is('regional/2018')) ? 'btn-primary' : 'btn-light' }}">2018</a>
                   <a href="/regional/2019" class="btn {{ (request()->is('regional/2019')) ? 'btn-primary' : 'btn-light' }}">2019</a>
                   <a href="/regional/2020" class="btn {{ (request()->is('regional/2020')) ? 'btn-primary' : 'btn-light' }}">2020</a>
                   <a href="/regional/2021" class="btn {{ (request()->is('regional/2021')) ? 'btn-primary' : 'btn-light' }}">2021</a>
               </div>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="row">
                    <table class="table table-bordered">
                        <tr>
                            <th rowspan="1" style="font-weight:bold; font-size:medium;">Country</th>
                            <th rowspan="1" style="font-weight:bold; font-size:medium;">Project Status</th>
                            <th rowspan="1" style="font-weight:bold; font-size:medium;">Processes (Activities)</th>
                            <th rowspan="1" style="font-weight:bold; font-size:medium;">Results (Outputs)</th>
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
                            <th rowspan="1" style="font-weight:bold; font-size:medium;">Budget (USD)</th>
                            <th rowspan="1" style="font-weight:bold; font-size:medium;">Budget Use</th>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">
                                @php
                                $anchor = "#";
                                @endphp
                                @if (auth()->user()->role == 999 || auth()->user()->role == auth()->user()->country)
                                @php
                                $anchor = "/kenya";
                                @endphp
                                @endif
                                <a href={{$anchor}}>Kenya</a>
                            </td>
                            <td style="background-color:yellow;font-weight: bold; color: black;">67%</td>
                            @php
                            $cl = "white";
                            if ($tta < 1) { $tta=1; }
                            $act_per = $tt/$tta * 100;
                            
                            if ($act_per <26) { $cl="white" ; $col="red" ; } if ($act_per>25 && $act_per<51) {
                                    $cl="black" ; $col="yellow" ; } if ($act_per>50 && $act_per<76) { $cl="white" ;
                                        $col="blue" ; } if ($act_per>75) {
                                        $cl = "white";
                                        $col = "green";
                                        }
                                        @endphp
                                        <td style="background-color:{{$col}};font-weight: bold; color: {{$cl}};">
                                            {{sprintf('%0.02f',$act_per)}}%</td>
                                        <td style="background-color:#0081c3;font-weight: bold; color: white;">59%</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td style="font-weight: bold;">4000</td>
                                                    <td style="font-weight: bold; padding-left: 122px;">4,750</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="font-weight: bold;">13,668,750</td>
                                        <td style="background-color:red;font-weight: bold; color: white;">19%</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">

                                @php
                                $anchor = "#";
                                @endphp
                                @if (auth()->user()->role == 999 || auth()->user()->role == auth()->user()->country)
                                @php
                                $anchor = "/somalia";
                                @endphp
                                @endif

                                <a href={{$anchor}}>Somalia</a></td>
                            <td style="background-color:green;font-weight: bold; color: white;">80%</td>
                            @php
                            $cl = "white";
                            if ($ttasom < 1) { $ttasom=1; } $act_per=$ttsom/$ttasom * 100; if ($act_per <26) { $cl="white" ; $col="red" ; } if ($act_per>25
                                && $act_per<51) { $cl="black" ; $col="yellow" ; } if ($act_per>50 && $act_per<76) { $cl="white" ; $col="blue" ; } if
                                        ($act_per>75) {
                                        $cl = "white";
                                        $col = "green";
                                        }
                                        @endphp
                                        <td style="background-color:{{$col}};font-weight: bold; color: {{$cl}};">
                                            {{sprintf('%0.02f',$act_per)}}%
                                        </td>
                            <td style="background-color:yellow;font-weight: bold; color: #0c4213;">46%</td>

                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">3000</td>
                                        <td style="font-weight: bold; padding-left: 122px;">3,140</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">2,056,122</td>
                            <td style="background-color:red;font-weight: bold; color: white;">15%</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">

                                @php
                                $anchor = "#";
                                @endphp
                                @if (auth()->user()->role == 999 || auth()->user()->role == auth()->user()->country)
                                @php
                                $anchor = "/ethiopia";
                                @endphp
                                @endif

                                <a href={{$anchor}}>
                                    Ethiopia</a></td>
                            <td style="background-color:green;font-weight: bold; color: white;">81%</td>

                            @php
                            $cl = "white";
                            if ($ttae < 1) {
                                $ttae=1;
                            }
                            $act_per = $tte/$ttae * 100;
                            if ($act_per <26) { $cl="white" ; $col="red" ; } if ($act_per>25 && $act_per<51) {
                                    $cl="black" ; $col="yellow" ; } if ($act_per>50 && $act_per<76) { $cl="white" ;
                                        $col="blue" ; } if ($act_per>75) {
                                        $cl = "white";
                                        $col = "green";
                                        }
                                        @endphp
                                        <td style="background-color:{{$col}};font-weight: bold; color: {{$cl}};">
                                            {{sprintf('%0.02f',$act_per)}}%
                                        </td>

                                        <td style="background-color:yellow;font-weight: bold; color: #0c4213;">47%</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td style="font-weight: bold;">4000</td>
                                                    <td style="font-weight: bold; padding-left: 122px;">2,271</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="font-weight: bold;">27,823,758</td>
                                        <td style="background-color:green;font-weight: bold; color: white;">76%</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">
                                @php
                                $anchor = "#";
                                @endphp
                                @if (auth()->user()->role == 999 || auth()->user()->role == auth()->user()->country)
                                @php
                                $anchor = "/sudan";
                                @endphp
                                @endif

                                <a href={{$anchor}}>Sudan</a></td>
                            <td style="background-color:yellow;font-weight: bold; color: black;">58%</td>
                           
                            @php
                                $cl = "white";
                                if ($ttasud < 1) { $ttasud=1; } $act_per=$ttsud/$ttasud * 100; if ($act_per <26) { $cl="white" ; $col="red" ; } if
                                    ($act_per>25
                                    && $act_per<51) { $cl="black" ; $col="yellow" ; } if ($act_per>50 && $act_per<76) { $cl="white" ; $col="blue" ; } if
                                            ($act_per>75) {
                                            $cl = "white";
                                            $col = "green";
                                            }
                                            @endphp
                                            <td style="background-color:{{$col}};font-weight: bold; color: {{$cl}};">
                                                {{sprintf('%0.02f',$act_per)}}%
                                            </td>
                            <td style="background-color:red;font-weight: bold; color: white;">18%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">3500</td>
                                        <td style="font-weight: bold;padding-left: 122px;">3,519</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">32,148,167</td>
                            <td style="background-color:yellow;font-weight: bold; color: white;">48%</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">
                                @php
                                $anchor = "#";
                                @endphp
                                @if (auth()->user()->role == 999 || auth()->user()->role == auth()->user()->country)
                                @php
                                $anchor = "/southsudan";
                                @endphp
                                @endif

                                <a href={{$anchor}}>South Sudan</a></td>
                            <td style="background-color:yellow;font-weight: bold; color: black;">64%</td>
                            @php
                                $cl = "white";
                                if ($ttass < 1) { $ttass=1; } $act_per=$ttss/$ttass * 100; if ($act_per <26) { $cl="white" ; $col="red" ; } if
                                    ($act_per>25
                                    && $act_per<51) { $cl="black" ; $col="yellow" ; } if ($act_per>50 && $act_per<76) { $cl="white" ; $col="blue" ; } if
                                            ($act_per>75) {
                                            $cl = "white";
                                            $col = "green";
                                            }
                                            @endphp
                                            <td style="background-color:{{$col}};font-weight: bold; color: {{$cl}};">
                                                {{sprintf('%0.02f',$act_per)}}%
                                            </td>
                            <td style="background-color:red;font-weight: bold; color: white;">21%</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">3000</td>
                                        <td style="font-weight: bold; padding-left: 122px;">3,330</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-weight: bold;">11,946,324</td>
                            <td style="background-color:#0081c3;font-weight: bold; color: white;">64%</td>
                        </tr>


                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection