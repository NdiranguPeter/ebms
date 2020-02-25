<style>
    .cdcc td {
        height: 60px;
     border-top: 1px solid #bfdeecdd;
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
        @foreach ($outputindicators as $outputindicator)
        @if ($outputindicator->id == $indicatorafter->indicator_id)         
        @php
          $gt = $gt + $indicatorafter->monthly_total;
             @endphp 
             @endif                               
        @endforeach
        @endforeach
        {{$gt}}
            
        </th>
    </tr>
    <tr>
        @php
        $gtb = 0;
        @endphp
        @foreach ($indicatorsbefore as $indicatorbefore)
        @foreach ($outputindicators as $outputindicator)
                @if ($outputindicator->id == $indicatorbefore->indicator_id)
        @php       
        $gtb = $gtb + $indicatorbefore->monthly_total;
               @endphp
                 @endif                               
        @endforeach
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
            if ($mp >25 && $mp <51) {
                $cl = "yellow";
            }
            if ($mp >50 && $mp <76) {
                $cl = "blue";
            }
            if ($mp >75) {
                $cl = "green";
            }
        @endphp
       <td colspan="4" style="background-color:{{$cl}}; font-weight:bold; color:#000;font-size: large;">
       {{$month}} perfomance: {{sprintf('%0.02f', $mp)}}%
        </td>
    </tr>
     <tr>
         @php
             $gtt = 0;
         @endphp
         @foreach ($cumulativeindicatorsafter as $cumulativeindicatorafter)
         @foreach ($outputindicators as $outputindicator)
        @if ($outputindicator->id == $cumulativeindicatorafter->indicator_id)
        @php
        $gtt = $gtt + $cumulativeindicatorafter->monthly_total;       
        @endphp
        @endif
            @endforeach
        @endforeach



        @php
             $grg = 0;
         @endphp
         @foreach ($cumulativeindicatorsbefore as $cumulativeindicatorbefore)
         @foreach ($outputindicators as $outputindicator)
        @if ($outputindicator->id == $cumulativeindicatorbefore->indicator_id)
        @php
        $grg = $grg + $cumulativeindicatorbefore->monthly_total;
        
        @endphp
        @endif
            @endforeach
        @endforeach
@php
$cl = ""; 

if ($grg > 0) {
$mmp = $gtt/$grg*100;
}else {
$mmp = $gtt*100;
}
if ($mmp < 26) { $cl="red" ; } if ($mmp >25 && $mmp <51) { $cl="yellow" ; } if ($mmp>50 && $mmp <76) { $cl="blue" ; } if ($mmp>
            75) {
            $cl = "green";
            }
            @endphp
        
       <td colspan="4" style="background-color:{{$cl}}; font-weight:bold; color:#000;font-size: large;">
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
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "February")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "March")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "April")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "May")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "June")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "July")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "August")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "September")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "October")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "November")
                    <td>
                        {{$indicatorbefore->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "December")
                    <td>
                        {{$indicatorbefore->monthly_total}}
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
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "February")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "March")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "April")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "May")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "June")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "July")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "August")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "September")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "October")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "November")
                    <td>
                        {{$indicatorafter->monthly_total}}
                    </td>
                    @endif
                    @if ($month == "December")
                    <td>
                        {{$indicatorafter->monthly_total}}
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
                    if ($indicatorbefore->monthly_total == 0 ) {
                    $indicatorbefore->monthly_total = 1;
                    }
                    $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                $cr = "green";
                                }
                                @endphp
                                <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                    {{sprintf('%0.02f',$perfom)}}%
                                </td>
                                @endif
                                @endforeach
                                @endif

                                @if ($month == "February")
                                @foreach ($indicatorsbefore as $indicatorbefore)
                                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                @php
                               if ($indicatorbefore->monthly_total == 0 ) { $indicatorbefore->monthly_total = 1;
                                }
                                $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if
                                        ($perfom>50 &&
                                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                            $cr = "green";
                                            }
                                            @endphp
                                            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                {{sprintf('%0.02f',$perfom)}}%
                                            </td>
                                            @endif
                                            @endforeach
                                            @endif

                                            @if ($month == "March")
                                            @foreach ($indicatorsbefore as $indicatorbefore)
                                            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                            @php
                                            if ($indicatorbefore->monthly_total==0 ) {
                                            $indicatorbefore->monthly_total = 1;
                                            }
                                            $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                        $cr = "green";
                                                        }
                                                        @endphp
                                                        <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                            {{sprintf('%0.02f',$perfom)}}%
                                                        </td>
                                                        @endif
                                                        @endforeach
                                                        @endif

@if ($month == "April")
@foreach ($indicatorsbefore as $indicatorbefore)
@if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
@php
if ($indicatorbefore->monthly_total==0 ) {
$indicatorbefore->monthly_total = 1;
}
$perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
            $cr = "green";
            }
            @endphp
            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                {{sprintf('%0.02f',$perfom)}}%
            </td>
            @endif
            @endforeach
            @endif


            @if ($month == "May")
            @foreach ($indicatorsbefore as $indicatorbefore)
            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
            @php
            if ($indicatorbefore->monthly_total==0 ) {
            $indicatorbefore->monthly_total = 1;
            }
            $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                        $cr = "green";
                        }
                        @endphp
                        <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                           {{sprintf('%0.02f',$perfom)}}%
                        </td>
                        @endif
                        @endforeach
                        @endif

                        @if ($month == "June")
                        @foreach ($indicatorsbefore as $indicatorbefore)
                        @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                        @php
                        if ($indicatorbefore->monthly_total==0 ) {
                        $indicatorbefore->monthly_total = 1;
                        }
                        $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                        if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                    $cr = "green";
                                    }
                                    @endphp
                                    <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                       {{sprintf('%0.02f',$perfom)}}%
                                    </td>
                                    @endif
                                    @endforeach
                                    @endif

                                    @if ($month == "July")
                                    @foreach ($indicatorsbefore as $indicatorbefore)
                                    @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                    @php
                                    if ($indicatorbefore->monthly_total==0 ) {
                                    $indicatorbefore->monthly_total = 1;
                                    }
                                    $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                $cr = "green";
                                                }
                                                @endphp
                                                <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                   {{sprintf('%0.02f',$perfom)}}%
                                                </td>
                                                @endif
                                                @endforeach
                                                @endif


                                                @if ($month == "August")
                                                @foreach ($indicatorsbefore as $indicatorbefore)
                                                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                @php
                                                if ($indicatorbefore->monthly_total==0 ) {
                                                $indicatorbefore->monthly_total = 1;
                                                }
                                                $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                            $cr = "green";
                                                            }
                                                            @endphp
                                                            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                               {{sprintf('%0.02f',$perfom)}}%
                                                            </td>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                            @if ($month == "September")
                                            @foreach ($indicatorsbefore as $indicatorbefore)
                                            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                            @php
                                            if ($indicatorbefore->monthly_total==0 ) {
                                            $indicatorbefore->monthly_total = 1;
                                            }
                                            $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) {
                                                    $cr="yellow" ; } if ($perfom>50 &&
                                                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                        $cr = "green";
                                                        }
                                                        @endphp
                                                        <td
                                                            style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                           {{sprintf('%0.02f',$perfom)}}%
                                                        </td>
                                                        @endif
                                                        @endforeach
                                                        @endif

                                                        @if ($month == "October")
                                                        @foreach ($indicatorsbefore as $indicatorbefore)
                                                        @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                        @php
                                                        if ($indicatorbefore->monthly_total==0 ) {
                                                        $indicatorbefore->monthly_total = 1;
                                                        }
                                                        $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                                        if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                                $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                    $cr = "green";
                                                                    }
                                                                    @endphp
                                                                    <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                                       {{sprintf('%0.02f',$perfom)}}%
                                                                    </td>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif

                                                                    @if ($month == "November")
                                                                    @foreach ($indicatorsbefore as $indicatorbefore)
                                                                    @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                                    @php
                                                                    if ($indicatorbefore->monthly_total==0 ) {
                                                                    $indicatorbefore->monthly_total = 1;
                                                                    }
                                                                    $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                                                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                                $cr = "green";
                                                                                }
                                                                                @endphp
                                                                                <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                                                   {{sprintf('%0.02f',$perfom)}}%
                                                                                </td>
                                                                                @endif
                                                                                @endforeach
                                                                                @endif

                                                                                @if ($month == "December")
                                                                                @foreach ($indicatorsbefore as $indicatorbefore)
                                                                                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                                                                @php
                                                                                if ($indicatorbefore->monthly_total==0 ) {
                                                                                    $indicatorbefore->monthly_total = 1;
                                                                                }
                                                                                $perfom = $indicatorafter->monthly_total / $indicatorbefore->monthly_total * 100;
                                                                                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                                                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                                            $cr = "green";
                                                                                            }
                                                                                            @endphp
                                                                                            <td style="background-color:{{$cr}}; color:white; font-weight:bold;">
                                                                                               {{sprintf('%0.02f',$perfom)}}%
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