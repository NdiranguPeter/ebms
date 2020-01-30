<style>
    .cdcc td {
        height: 60px;
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
        border-top: 1px solid #bfdeec;
    }
</style>
<table class="table table-bordered">
    <tr>
        <td>Project name </td>
        <th colspan="3"> {{$project->name}} </th>
    </tr>
    
    {{-- <tr>
        <td>Total Budget </td>
        <th>0</th>
        <td>Total female reached</th>
        <th>{{$total}}</td>
    </tr> --}}
    <tr>
        <td>Reporting month</td>
        <th> {{$month}} </th>
    <td>Total beneficiaries reached in {{$month}}</td>

        <th> 
            @php
                $gt = 0; 
        @endphp
        @foreach ($indicatorsafter as $indicatorafter)
        @php
        if ($month == "January") {
          $gt = $gt + $indicatorafter->jan;
        }
        if ($month == "February") {
          $gt = $gt+ $indicatorafter->feb;
        }
        if ($month == "March") {
        $gt = $gt+ $indicatorafter->mar;
        }
        if ($month == "April") {
        $gt = $gt+ $indicatorafter->apr;
        }
        if ($month == "May") {
        $gt = $gt+ $indicatorafter->may;
        }
        if ($month == "June") {
        $gt = $gt+ $indicatorafter->jun;
        }
        if ($month == "July") {
        $gt = $gt+ $indicatorafter->jul;
        }
        if ($month == "August") {
        $gt = $gt+ $indicatorafter->aug;
        }
        if ($month == "September") {
        $gt = $gt+ $indicatorafter->sep;
        }
        if ($month == "October") {
        $gt = $gt+ $indicatorafter->oct;
        }
        if ($month == "November") {
        $gt = $gt+ $indicatorafter->nov;
        }
        if ($month == "December") {
        $gt = $gt+ $indicatorafter->dec;
        }
        @endphp                                
        @endforeach
        {{$gt}}
            
        </th>
    </tr>
    <tr>
        @php
        $gtb = 0;
        @endphp
        @foreach ($indicatorsbefore as $indicatorbefore)
        @php
        if ($month == "January") {
        $gtb = $gtb + $indicatorbefore->jan;
        }
        if ($month == "February") {
        $gtb = $gtb+ $indicatorbefore->feb;
        }
        if ($month == "March") {
        $gtb = $gtb+ $indicatorbefore->mar;
        }
        if ($month == "April") {
        $gtb = $gtb+ $indicatorbefore->apr;
        }
        if ($month == "May") {
        $gtb = $gtb+ $indicatorbefore->may;
        }
        if ($month == "June") {
        $gtb = $gtb+ $indicatorbefore->jun;
        }
        if ($month == "July") {
        $gtb = $gtb+ $indicatorbefore->jul;
        }
        if ($month == "August") {
        $gtb = $gtb+ $indicatorbefore->aug;
        }
        if ($month == "September") {
        $gtb = $gtb+ $indicatorbefore->sep;
        }
        if ($month == "October") {
        $gtb = $gtb+ $indicatorbefore->oct;
        }
        if ($month == "November") {
        $gtb = $gtb+ $indicatorbefore->nov;
        }
        if ($month == "December") {
        $gtb = $gtb+ $indicatorbefore->dec;
        }

        @endphp
        @endforeach

        @php
        $cl = "";
            if ($gtb > 0) {
               $mp = $gt/$gtb*100;
            }else {
               $mp = $gt*100;
            }
            if ($mp <26) {
                $cl = "red";
            }
            if ($mp >25 && $mp <50) {
                $cl = "yellow";
            }
            if ($mp >50 && $mp <75) {
                $cl = "blue";
            }
            if ($mp >75) {
                $cl = "green";
            }
        @endphp
       <td colspan="4" style="background-color:{{$cl}}; font-weight:bold; color:white;">
       {{$month}} perfomance: {{sprintf('%0.02f', $mp)}}%
        </td>
    </tr>
     <tr>
         @php
             $gtt = 0;
         @endphp
         @foreach ($indicatorsafter as $indicatorafter)
        @php
        if ($month == "January") {
        $gtt = $gtt + $indicatorafter->jan;
        }
        if ($month == "February") {
        $gtt = $gtt + $indicatorafter->jan + $indicatorafter->feb;
        }
        if ($month == "March") {
        $gtt = $gtt + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
        }
        if ($month == "April") {
        $gtt = $gtt + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
        }
        if ($month == "May") {
        $gtt = $gtt + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may;
        }
        if ($month == "June") {
        $gtt = $gtt  + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun;
        }
        if ($month == "July") {
        $gtt = $gtt + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may +
        $indicatorafter->jun + $indicatorafter->jul;
        }
        if ($month == "August") {
        $gtt = $gtt + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may +
        $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
        }
        if ($month == "September") {
        $gtt = $gtt + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may +
        $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
        }
        if ($month == "October") {
        $gtt = $gtt  + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may +
        $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct;
        }
        if ($month == "November") {
        $gtt = $gtt   + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may +
        $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov;
        }
        if ($month == "December") {
        $gtt = $gtt   + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may +
        $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
        }
        @endphp
        @endforeach



        @php
             $grg = 0;
         @endphp
         @foreach ($indicatorsbefore as $indicatorbefore)
        @php
        if ($month == "January") {
        $grg = $grg + $indicatorbefore->jan;
        }
        if ($month == "February") {
        $grg = $grg + $indicatorbefore->jan + $indicatorbefore->feb;
        }
        if ($month == "March") {
        $grg = $grg + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar;
        }
        if ($month == "April") {
        $grg = $grg + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr;
        }
        if ($month == "May") {
        $grg = $grg + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may;
        }
        if ($month == "June") {
        $grg = $grg  + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun;
        }
        if ($month == "July") {
        $grg = $grg + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may +
        $indicatorbefore->jun + $indicatorbefore->jul;
        }
        if ($month == "August") {
        $grg = $grg + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may +
        $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug;
        }
        if ($month == "September") {
        $grg = $grg + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may +
        $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep;
        }
        if ($month == "October") {
        $grg = $grg  + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may +
        $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep + $indicatorbefore->oct;
        }
        if ($month == "November") {
        $grg = $grg   + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may +
        $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep + $indicatorbefore->oct + $indicatorbefore->nov;
        }
        if ($month == "December") {
        $grg = $grg   + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may +
        $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep + $indicatorbefore->oct + $indicatorbefore->nov + $indicatorbefore->dec;
        }
        @endphp
        @endforeach
@php
$cl = ""; 

if ($grg > 0) {
$mmp = $gtt/$grg*100;
}else {
$mmp = $gtt*100;
}
if ($mmp < 26) { $cl="red" ; } if ($mmp >25 && $mmp <50) { $cl="yellow" ; } if ($mmp>50 && $mmp <75) { $cl="blue" ; } if ($mmp>
            75) {
            $cl = "green";
            }
            @endphp
        
       <td colspan="4" style="background-color:{{$cl}}; font-weight:bold; color:white;">
       Cumulative perfomance: {{sprintf('%0.02f',$mmp)}}%
        </td>
    </tr>
   
    
</table>

<h2>SECTION 1. TECHNICAL ACCOMPLISHMENT AGAINST PLAN DURING THE MONTH</h2>
<table class="cdcc table table-bordered">
    <tr style="background: #349ba7 !important;color: #fff;">
        <th style="max-width:200px;padding: 8px;">Outputs</th>
        <th style="max-width:600px;padding: 8px;">Indicator description</th>
        <th style="padding: 8px;">Baseline</th>
        <th style="padding: 8px;">Total targeted for the month</th>
        <th style="padding: 8px;">Achievement for the month of {{$month}}</th>
        <th style="padding: 8px;">RYBG</th>
    </tr>
    @php
    $i = 1;
    @endphp
    @foreach ($outputs as $output)

    <tr style="font-size: smaller;">
        <th style="max-width:200px; padding: 8px;"> Output {{$i}} - {!!$output->name!!} </th>

        <td style="max-width:600px;">
            <table class="table">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{!!$outputindicator->name!!}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td>
            <table class="table" id="liss">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$outputindicator->baseline_target}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td>
            <table class="table" id="liss">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($outputindicator->id == $indicatorbefore->indicator_id)
                <tr>

                    @if ($month == "January")
                    <td>
                        {{$indicatorbefore->jan}}
                    </td>
                    @endif
                    @if ($month == "February")
                    <td>
                        {{$indicatorbefore->feb}}
                    </td>
                    @endif
                    @if ($month == "March")
                    <td>
                        {{$indicatorbefore->mar}}
                    </td>
                    @endif
                    @if ($month == "April")
                    <td>
                        {{$indicatorbefore->apr}}
                    </td>
                    @endif
                    @if ($month == "May")
                    <td>
                        {{$indicatorbefore->may}}
                    </td>
                    @endif
                    @if ($month == "June")
                    <td>
                        {{$indicatorbefore->jun}}
                    </td>
                    @endif
                    @if ($month == "July")
                    <td>
                        {{$indicatorbefore->jul}}
                    </td>
                    @endif
                    @if ($month == "August")
                    <td>
                        {{$indicatorbefore->aug}}
                    </td>
                    @endif
                    @if ($month == "September")
                    <td>
                        {{$indicatorbefore->sep}}
                    </td>
                    @endif
                    @if ($month == "October")
                    <td>
                        {{$indicatorbefore->oct}}
                    </td>
                    @endif
                    @if ($month == "November")
                    <td>
                        {{$indicatorbefore->nov}}
                    </td>
                    @endif
                    @if ($month == "December")
                    <td>
                        {{$indicatorbefore->dec}}
                    </td>
                    @endif

                </tr>

                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td>
            <table class="table" id="liss">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                
                    @if ($month == "January")
                    <td>
                        {{$indicatorafter->jan}}
                    </td>
                    @endif
                    @if ($month == "February")
                    <td>
                        {{$indicatorafter->feb}}
                    </td>
                    @endif
                    @if ($month == "March")
                    <td>
                        {{$indicatorafter->mar}}
                    </td>
                    @endif
                    @if ($month == "April")
                    <td>
                        {{$indicatorafter->apr}}
                    </td>
                    @endif
                    @if ($month == "May")
                    <td>
                        {{$indicatorafter->may}}
                    </td>
                    @endif
                    @if ($month == "June")
                    <td>
                        {{$indicatorafter->jun}}
                    </td>
                    @endif
                    @if ($month == "July")
                    <td>
                        {{$indicatorafter->jul}}
                    </td>
                    @endif
                    @if ($month == "August")
                    <td>
                        {{$indicatorafter->aug}}
                    </td>
                    @endif
                    @if ($month == "September")
                    <td>
                        {{$indicatorafter->sep}}
                    </td>
                    @endif
                    @if ($month == "October")
                    <td>
                        {{$indicatorafter->oct}}
                    </td>
                    @endif
                    @if ($month == "November")
                    <td>
                        {{$indicatorafter->nov}}
                    </td>
                    @endif
                    @if ($month == "December")
                    <td>
                        {{$indicatorafter->dec}}
                    </td>
                    @endif
                
                </tr>

                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td>
            <table class="table" id="liss">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    @if ($month == "January")
                    @foreach ($indicatorsbefore as $indicatorbefore)
                    @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                    @php
                    if ($indicatorbefore->jan == 0 ) {
                    $indicatorbefore->jan = 1;
                    }
                    $perfom = $indicatorafter->jan / $indicatorbefore->jan * 100;
                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                $cr = "green";
                                }
                                @endphp
                                <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                    {{sprintf('%0.0f',$perfom)}}%
                                </td>
                                @endif
                                @endforeach
                                @endif

                                @if ($month == "February")
                                @foreach ($indicatorsbefore as $indicatorbefore)
                                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                @php
                               if ($indicatorbefore->feb == 0 ) { $indicatorbefore->feb = 1;
                                }
                                $perfom = $indicatorafter->feb / $indicatorbefore->feb * 100;
                                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if
                                        ($perfom>50 &&
                                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                            $cr = "green";
                                            }
                                            @endphp
                                            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                {{sprintf('%0.0f',$perfom)}}%
                                            </td>
                                            @endif
                                            @endforeach
                                            @endif

                                            @if ($month == "March")
                                            @foreach ($indicatorsbefore as $indicatorbefore)
                                            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                            @php
                                            if ($indicatorbefore->mar==0 ) {
                                            $indicatorbefore->mar = 1;
                                            }
                                            $perfom = $indicatorafter->mar / $indicatorbefore->mar * 100;
                                            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                        $cr = "green";
                                                        }
                                                        @endphp
                                                        <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                            {{sprintf('%0.0f',$perfom)}}%
                                                        </td>
                                                        @endif
                                                        @endforeach
                                                        @endif

@if ($month == "April")
@foreach ($indicatorsbefore as $indicatorbefore)
@if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
@php
if ($indicatorbefore->apr==0 ) {
$indicatorbefore->apr = 1;
}
$perfom = $indicatorafter->apr / $indicatorbefore->apr * 100;
if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
            $cr = "green";
            }
            @endphp
            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                {{sprintf('%0.0f',$perfom)}}%
            </td>
            @endif
            @endforeach
            @endif


            @if ($month == "May")
            @foreach ($indicatorsbefore as $indicatorbefore)
            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
            @php
            if ($indicatorbefore->may==0 ) {
            $indicatorbefore->may = 1;
            }
            $perfom = $indicatorafter->may / $indicatorbefore->may * 100;
            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                        $cr = "green";
                        }
                        @endphp
                        <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                           {{sprintf('%0.0f',$perfom)}}%
                        </td>
                        @endif
                        @endforeach
                        @endif

                        @if ($month == "June")
                        @foreach ($indicatorsbefore as $indicatorbefore)
                        @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                        @php
                        if ($indicatorbefore->jun==0 ) {
                        $indicatorbefore->jun = 1;
                        }
                        $perfom = $indicatorafter->jun / $indicatorbefore->jun * 100;
                        if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                    $cr = "green";
                                    }
                                    @endphp
                                    <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                       {{sprintf('%0.0f',$perfom)}}%
                                    </td>
                                    @endif
                                    @endforeach
                                    @endif

                                    @if ($month == "July")
                                    @foreach ($indicatorsbefore as $indicatorbefore)
                                    @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                    @php
                                    if ($indicatorbefore->jul==0 ) {
                                    $indicatorbefore->jul = 1;
                                    }
                                    $perfom = $indicatorafter->jul / $indicatorbefore->jul * 100;
                                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                $cr = "green";
                                                }
                                                @endphp
                                                <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                   {{sprintf('%0.0f',$perfom)}}%
                                                </td>
                                                @endif
                                                @endforeach
                                                @endif


                                                @if ($month == "August")
                                                @foreach ($indicatorsbefore as $indicatorbefore)
                                                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                @php
                                                if ($indicatorbefore->aug==0 ) {
                                                $indicatorbefore->aug = 1;
                                                }
                                                $perfom = $indicatorafter->aug / $indicatorbefore->aug * 100;
                                                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                            $cr = "green";
                                                            }
                                                            @endphp
                                                            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                               {{sprintf('%0.0f',$perfom)}}%
                                                            </td>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                            @if ($month == "September")
                                            @foreach ($indicatorsbefore as $indicatorbefore)
                                            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                            @php
                                            if ($indicatorbefore->sep==0 ) {
                                            $indicatorbefore->sep = 1;
                                            }
                                            $perfom = $indicatorafter->sep / $indicatorbefore->sep * 100;
                                            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) {
                                                    $cr="yellow" ; } if ($perfom>50 &&
                                                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                        $cr = "green";
                                                        }
                                                        @endphp
                                                        <td
                                                            style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                           {{sprintf('%0.0f',$perfom)}}%
                                                        </td>
                                                        @endif
                                                        @endforeach
                                                        @endif

                                                        @if ($month == "October")
                                                        @foreach ($indicatorsbefore as $indicatorbefore)
                                                        @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                        @php
                                                        if ($indicatorbefore->oct==0 ) {
                                                        $indicatorbefore->oct = 1;
                                                        }
                                                        $perfom = $indicatorafter->oct / $indicatorbefore->oct * 100;
                                                        if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                                $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                    $cr = "green";
                                                                    }
                                                                    @endphp
                                                                    <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                                       {{sprintf('%0.0f',$perfom)}}%
                                                                    </td>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif

                                                                    @if ($month == "November")
                                                                    @foreach ($indicatorsbefore as $indicatorbefore)
                                                                    @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                                    @php
                                                                    if ($indicatorbefore->nov==0 ) {
                                                                    $indicatorbefore->nov = 1;
                                                                    }
                                                                    $perfom = $indicatorafter->nov / $indicatorbefore->nov * 100;
                                                                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                                $cr = "green";
                                                                                }
                                                                                @endphp
                                                                                <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                                                   {{sprintf('%0.0f',$perfom)}}%
                                                                                </td>
                                                                                @endif
                                                                                @endforeach
                                                                                @endif

                                                                                @if ($month == "December")
                                                                                @foreach ($indicatorsbefore as $indicatorbefore)
                                                                                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                                                @php
                                                                                if ($indicatorbefore->dec==0 ) {
                                                                                    $indicatorbefore->dec = 1;
                                                                                }
                                                                                $perfom = $indicatorafter->dec / $indicatorbefore->dec * 100;
                                                                                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                                                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                                            $cr = "green";
                                                                                            }
                                                                                            @endphp
                                                                                            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                                                               {{sprintf('%0.0f',$perfom)}}%
                                                                                            </td>
                                                                                            @endif
                                                                                            @endforeach
                                                                                            @endif

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
<h2>Section 3: General observations and recommendations</h2>
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