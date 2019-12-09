<style>
    .cdcc td {
        height: 75px;
    }

    .cdcc>tbody>tr>td,
    .cdcc>tbody>tr>th,
    .cdcc>tfoot>tr>td,
    .cdcc>tfoot>tr>th,
    .cdcc>thead>tr>td,
    .cdcc>thead>tr>th {
        padding: 0px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #bfdeec
    }
</style>
<table class="table table-bordered">
    <tr>
        <td>Project name: </td>
        <td colspan="3"> {{$project->name}} </td>
    </tr>

    @php
    $total = 0;
    $total1 = 0;
    $total2 = 0;
    $total3 = 0;
    $total4 = 0;
    $target_total = 0;
    @endphp
    @foreach ($outputindicators as $outputindicator)
    @foreach ($indicatorsafter as $indicatorafter)
    @if ($outputindicator->id == $indicatorafter->indicator_id)
    @php

    if($qrt == 'QRT 1'){
    $total1 = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar ;
    }
    if($qrt == 'QRT 2'){
    $total2 = $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun ;
    }
    if($qrt == 'QRT 3'){
    $total3 = $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
    }
    if($qrt == 'QRT 4'){
    $total4 = $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
    }
    @endphp
    @endif
    @endforeach
    @endforeach
    <tr>
        <td>Total Budget </td>
        <td>{{$project->budget}}</td>
        <td>Total female reached</td>
        <td>{{$total}}</td>
    </tr>
    <tr>
        <td>Reporting quarter</td>
        <td> {{$qrt}} </td>
        <td>Total male reached</td>

        <td> {{$total}} </td>
    </tr>
    <tr>
        <td>Expenditure for this quarter</td>
        <td>
            {{$project->budget}}
        </td>
        <td>Total beneficiaries served</td>
        <td>{{$total}}</td>
    </tr>
    <tr>
        <td colspan="4">
            <b>Overall perfomance</b>
            @foreach ($outputindicators as $outputindicator)
            @php
            $target_total = $target_total + $outputindicator->project_target;
            @endphp
            @endforeach
            @php
            if ($qrt == 'QRT 1' && $target_total > 0) {
            $perc = $total1/($target_total/4);
            }
            if ($qrt == 'QRT 2' && $target_total > 0) {
            $perc = $total2/($target_total/4);
            }
            if ($qrt == 'QRT 3' && $target_total > 0) {
            $perc = $total3/($target_total/4);
            }
            if ($qrt == 'QRT 4' && $target_total > 0) {
            $perc = $total4/($target_total/4);
            }
            if (($qrt == 'QRT 1' || $qrt == 'QRT 2' || $qrt == 'QRT 3' || $qrt == 'QRT 4') && $target_total < 0) {
                $perc=0; } $perc=sprintf('%0.2f', $perc); if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50)
                    { $color='yellow' ; } if ($perc> 49 && $perc
                    <75) { $color='blue' ; } if ($perc> 74) {
                        $color = 'green';
                        }
                        @endphp
                        <div
                            style="font-weight: bold; font-size: xx-large; border:1px solid #fff; color:#fff; padding:0px 0px 0px 10px; background-color:{{$color}}">
                            {{$perc}}%
                        </div>

        </td>
    </tr>
</table>
<h2>SECTION 1. TECHNICAL ACCOMPLISHMENT AGAINST PLAN DURING THE QUARTER </h2>
<table class="table table-bordered">
    <tr style="background: #349ba7 !important;color: #fff;">
        <th>Outcomes | Outputs</th>
        <th>Indicator description</th>
        <th>Value at start</th>
        <th>Total targeted for the quarter</th>
        <th>Achievement for the quarter of {{$qrt}}</th>
        {{-- <th>RYGB</th> --}}
    </tr>
    @php
    $y = 1;
    @endphp
    @foreach ($outcomes as $outcome)

    <tr>
        <td style="color:#0081c3; font-size:bold;">outcome {{$y}} - {!!$outcome->name!!} </td>

        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{!!$outcomeindicator->name!!}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$outcomeindicator->project_target}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" id="liss">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{sprintf('%0.0f', $outcomeindicator->project_target/4)}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" id="liss">
                @php
                if($qrt == 'QRT 1'){
                $tqrt1 = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
                }if($qrt == 'QRT 2'){
                $tqrt1 = $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun;
                }if($qrt == 'QRT 3'){
                $tqrt1 = $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
                }if($qrt == 'QRT 4'){
                $tqrt1 = $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
                }
                @endphp
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$tqrt1}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>

    </tr>
    @php
    $i = 1;
    @endphp

    @foreach ($outputs as $output)
    @if ($outcome->id == $output->outcome_id)
    <tr>
        <td><b>output {{$y}}.{{$i}}</b> - {!!$output->name!!} </td>

        <td style="padding:0px !important;">

            <table class="table cdcc">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                <tr>
                    <td>{!!$outputindicator->name!!}</td>
                </tr>
                @endif
                @endforeach

            </table>
        </td>

        <td style="padding:0px !important;">
            <table class="table cdcc" id="liss" style="padding:0px !important;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                <tr>
                    <td>
                        {{$outputindicator->baseline_target}}
                    </td>
                </tr>
                @endif
                @endforeach

            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" id="liss">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)

                @php
                $tqt1 = $outputindicator->project_target/4;
                if($tqt1 < 1){ $tqt1=1; } @endphp <tr>
        <td><b>{{$tqt1}}</b></td>
    </tr>
    @endif
    @endforeach


</table>
</td>
<td colspan="2" style="min-width:200px; padding:0px !important;">
    <table class="table cdcc" id="liss">

        @foreach ($outputindicators as $outputindicator)
        @if ($output->id == $outputindicator->output_id)
        @foreach ($indicatorsafter as $indicatorafter)
        @if ($outputindicator->id == $indicatorafter->indicator_id)
        @php
        if($outputindicator->project_target == 0){
        $tqt1 = 0;
        }else{
        $tqt1 = $outputindicator->project_target/4;
        }
        if($tqt1 < 1){ $tqt1=1; } @endphp @php $t=0; if($qrt=='QRT 1' ){ $t=$indicatorafter->jan +
            $indicatorafter->feb + $indicatorafter->mar;
            }
            if($qrt == 'QRT 2'){
            $t = $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun;
            }
            if($qrt == 'QRT 3'){
            $t = $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
            }
            if($qrt == 'QRT 4'){
            $t = $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
            }
            $prc = $t/$tqt1;

            $perc=sprintf('%0.2f', $prc*100);

            if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 &&
                    $perc <75) { $color='blue' ; } if ($perc> 74) {
                        $color = 'green';
                        }
                        @endphp
                        <tr>
                            <td>{{$t}}</td>

                            <td
                                style="border:1px solid #fff;width:100px; padding:0px 0px 0px 10px; color:#fff; margin-left: 20px; background-color:{{$color}};font-weight: bold;">
                                <span>
                                    {{$perc}}% </span></td>

                        </tr>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

    </table>
</td>


</tr>
@php
$i++;
@endphp
@endif
@endforeach


@php
$y++;
@endphp
@endforeach
</table>
<hr>
<h2>Section 2: Major challenges and solutions</h2>
<hr>
<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Challenge</th>
            <th>Solution</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($challenges as $challenge)
        <tr>
            <td>{{$challenge->challenge}}</td>
            <td>{{$challenge->solution}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
<h2>Section 3: General observation and recommendation</h2>
<hr>
<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Observation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($challenges as $challenge)
        <tr>
            <td>{{$challenge->observation}}</td>
        </tr>
        @endforeach

    </tbody>
</table>