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

                            <td>Budget</td>
                        </tr>

                        @foreach ($countries as $country)
                        <tr>
                            <td style="font-weight:bold;"><a href="#">{{$country->name}}</a></td>

                            @if ($country->id == 1)

                            @if ($kenyaa->count() == 0)
                            <td>No project this year</td>
                            @endif
                            @if ($kenyaa->count() != 0)
                            @php
                            $ta = 0;
                            $tb = 0;
                            @endphp
                            @foreach ($kenyaa as $kenya)
                            @php
                            $ta = $ta + $kenya->jan+ $kenya->feb+ $kenya->mar+ $kenya->apr+ $kenya->may+ $kenya->jun+
                            $kenya->jul+ $kenya->aug+ $kenya->sep+ $kenya->oct+ $kenya->nov+ $kenya->dec;
                            @endphp
                            @endforeach
                            @foreach ($kenyab as $knya)
                            @php
                            $tb =$tb+$knya->jan+ $knya->feb+ $knya->mar+ $knya->apr+ $knya->may+ $knya->jun+
                            $knya->jul+ $knya->aug+ $knya->sep+ $knya->oct+ $knya->nov+ $knya->dec;
                            @endphp
                            @endforeach
                            @php
                            if ($tb > 0) {
                            $perc = $ta/$tb * 100;
                            }else{
                            $perc = $ta * 100;
                            }
                            $perc = sprintf('%0.2f', $perc);
                            if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if
                                    ($perc> 49 && $perc
                                    <75) { $color='blue' ; } if ($perc> 74) {
                                        $color = 'green';
                                        }
                                        @endphp

                                        <td style="background-color:{{$color}};color:#fff; font-weight:bold;">{{$perc}}%
                                        </td>

                                        @endif
                                        @endif

                                        @if ($country->id == 2)

                                        @if ($somaliaa->count() == 0)
                                        <td>No project this year</td>
                                        @endif
                                        @if ($somaliaa->count() != 0)
                                        @php
                                        $ta = 0;
                                        $tb = 0;
                                        @endphp
                                        @foreach ($somaliaa as $somalia)
                                        @php
                                        $ta = $ta + $somalia->jan+ $somalia->feb+ $somalia->mar+ $somalia->apr+
                                        $somalia->may+ $somalia->jun+
                                        $somalia->jul+ $somalia->aug+ $somalia->sep+ $somalia->oct+ $somalia->nov+
                                        $somalia->dec;
                                        @endphp
                                        @endforeach
                                        @foreach ($somaliab as $somali)
                                        @php
                                        $tb =$tb+$somali->jan+ $somali->feb+ $somali->mar+ $somali->apr+ $somali->may+
                                        $somali->jun+
                                        $somali->jul+ $somali->aug+ $somali->sep+ $somali->oct+ $somali->nov+
                                        $somali->dec;
                                        @endphp
                                        @endforeach
                                        @php
                                        if ($tb > 0) {
                                        $perc = $ta/$tb * 100;
                                        }else{
                                        $perc = $ta * 100;
                                        }
                                        $perc = sprintf('%0.2f', $perc);
                                        if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow'
                                                ; } if ($perc> 49 && $perc
                                                <75) { $color='blue' ; } if ($perc> 74) {
                                                    $color = 'green';
                                                    }
                                                    @endphp

                                                    <td
                                                        style="background-color:{{$color}};color:#fff; font-weight:bold;">
                                                        {{$perc}}%
                                                    </td>
                                                    @endif
                                                    @endif

                                                    @if ($country->id == 3)

                                                    @if ($ethiopiaa->count() == 0)
                                                    <td>No project this year</td>
                                                    @endif
                                                    @if ($ethiopiaa->count() != 0)
                                                    @php
                                                    $ta = 0;
                                                    $tb = 0;
                                                    @endphp
                                                    @foreach ($ethiopiaa as $ethiopia)
                                                    @php
                                                    $ta = $ta + $ethiopia->jan+ $ethiopia->feb+ $ethiopia->mar+
                                                    $ethiopia->apr+ $ethiopia->may+ $ethiopia->jun+
                                                    $ethiopia->jul+ $ethiopia->aug+ $ethiopia->sep+ $ethiopia->oct+
                                                    $ethiopia->nov+ $ethiopia->dec;
                                                    @endphp
                                                    @endforeach
                                                    @foreach ($ethiopiab as $ethiopi)
                                                    @php
                                                    $tb =$tb+$ethiopi->jan+ $ethiopi->feb+ $ethiopi->mar+ $ethiopi->apr+
                                                    $ethiopi->may+ $ethiopi->jun+
                                                    $ethiopi->jul+ $ethiopi->aug+ $ethiopi->sep+ $ethiopi->oct+
                                                    $ethiopi->nov+ $ethiopi->dec;
                                                    @endphp
                                                    @endforeach
                                                    @php
                                                    if ($tb > 0) {
                                                    $perc = $ta/$tb * 100;
                                                    }else{
                                                    $perc = $ta * 100;
                                                    }
                                                    $perc = sprintf('%0.2f', $perc);
                                                    if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) {
                                                            $color='yellow' ; } if ($perc> 49 && $perc
                                                            <75) { $color='blue' ; } if ($perc> 74) {
                                                                $color = 'green';
                                                                }
                                                                @endphp

                                                                <td
                                                                    style="background-color:{{$color}};color:#fff; font-weight:bold;">
                                                                    {{$perc}}%
                                                                </td>

                                                                @endif
                                                                @endif

                                                                @if ($country->id == 4)

                                                                @if ($sudana->count() == 0) <td>No project this year
                                                                </td>
                                                                @endif
                                                                @if ($sudana->count() != 0)
                                                                @php
                                                                $ta = 0;
                                                                $tb = 0;
                                                                @endphp
                                                                @foreach ($sudana as $sudan)
                                                                @php
                                                                $ta = $ta + $sudan->jan+ $sudan->feb+ $sudan->mar+
                                                                $sudan->apr+ $sudan->may+ $sudan->jun+
                                                                $sudan->jul+ $sudan->aug+ $sudan->sep+ $sudan->oct+
                                                                $sudan->nov+ $sudan->dec;
                                                                @endphp
                                                                @endforeach
                                                                @foreach ($sudanb as $suda)
                                                                @php
                                                                $tb =$tb+$suda->jan+ $suda->feb+ $suda->mar+ $suda->apr+
                                                                $suda->may+ $suda->jun+
                                                                $suda->jul+ $suda->aug+ $suda->sep+ $suda->oct+
                                                                $suda->nov+ $suda->dec;
                                                                @endphp
                                                                @endforeach
                                                                @php
                                                                if ($tb > 0) {
                                                                $perc = $ta/$tb * 100;
                                                                }else{
                                                                $perc = $ta * 100;
                                                                }
                                                                $perc = sprintf('%0.2f', $perc);
                                                                if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc
                                                                    <50) { $color='yellow' ; } if ($perc> 49 && $perc
                                                                        <75) { $color='blue' ; } if ($perc> 74) {
                                                                            $color = 'green';
                                                                            }
                                                                            @endphp

                                                                            <td
                                                                                style="background-color:{{$color}};color:#fff; font-weight:bold;">
                                                                                {{$perc}}%
                                                                            </td>

                                                                            @endif
                                                                            @endif

                                                                            @if ($country->id == 5)

                                                                            @if ($southsudana->count() == 0)
                                                                            <td>No project this year</td>
                                                                            @endif
                                                                            @if ($southsudana->count() != 0)
                                                                            @php
                                                                            $ta = 0;
                                                                            $tb = 0;
                                                                            @endphp
                                                                            @foreach ($southsudana as $southsudan)
                                                                            @php
                                                                            $ta = $ta + $southsudan->jan+
                                                                            $southsudan->feb+ $southsudan->mar+
                                                                            $southsudan->apr+ $southsudan->may+
                                                                            $southsudan->jun+
                                                                            $southsudan->jul+ $southsudan->aug+
                                                                            $southsudan->sep+ $southsudan->oct+
                                                                            $southsudan->nov+ $southsudan->dec;
                                                                            @endphp
                                                                            @endforeach
                                                                            @foreach ($southsudanb as $southsuda)
                                                                            @php
                                                                            $tb =$tb+$southsuda->jan+ $southsuda->feb+
                                                                            $southsuda->mar+ $southsuda->apr+
                                                                            $southsuda->may+ $southsuda->jun+
                                                                            $southsuda->jul+ $southsuda->aug+
                                                                            $southsuda->sep+ $southsuda->oct+
                                                                            $southsuda->nov+ $southsuda->dec;
                                                                            @endphp
                                                                            @endforeach
                                                                            @php
                                                                            if ($tb > 0) {
                                                                            $perc = $ta/$tb * 100;
                                                                            }else{
                                                                            $perc = $ta * 100;
                                                                            }
                                                                            $perc = sprintf('%0.2f', $perc);
                                                                            if ($perc <25) { $color='red' ; } if ($perc>
                                                                                24 && $perc <50) { $color='yellow' ; }
                                                                                    if ($perc> 49 && $perc
                                                                                    <75) { $color='blue' ; } if ($perc>
                                                                                        74) {
                                                                                        $color = 'green';
                                                                                        }
                                                                                        @endphp

                                                                                        <td
                                                                                            style="background-color:{{$color}};color:#fff; font-weight:bold;">
                                                                                            {{$perc}}%
                                                                                        </td>

                                                                                        @endif
                                                                                        @endif

                                                                                        <td></td>
                                                                                        <td>
                                                                                            @php
                                                                                            $bud = 0;
                                                                                            @endphp
                                                                                            @foreach ($projects as
                                                                                            $project)
                                                                                            @if ($project->country ==
                                                                                            $country->id)
                                                                                            @php
                                                                                            $bud = $bud +
                                                                                            $project->budget;
                                                                                            @endphp
                                                                                            @endif
                                                                                            @endforeach
                                                                                            {{number_format($bud)}}
                                                                                        </td>

                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection