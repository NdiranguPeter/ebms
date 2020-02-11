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
        vertical-align: middle;
        border-top: 1px solid #bfdeec
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
        <td>Reporting quarter</td>
        <th> {{$qrt}} </th>
        <td>Total beneficiaries reached in {{$qrt}}</td>

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
        if ($mp <26) { $cl="red" ; } if ($mp>25 && $mp <51) { $cl="yellow" ; } if ($mp>50 && $mp <75) { $cl="blue" ; }
                    if ($mp>75) {
                    $cl = "green";
                    }
                    @endphp

                    <tr>
                    <td colspan="4" style="background-color:{{$cl}}; font-weight:bold; color:#000;font-size: large;">
                        {{$qrt}} perfomance: {{sprintf('%0.02f', $mp)}}%
                    </td>
    </tr>
   
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
        if ($mmp < 26) { 
            $cl="red" ; 
        } 
        if ($mmp>25 && $mmp <51) {
             $cl="yellow" ;
             } 
        if ($mmp>50 && $mmp <75) { 
            $cl="blue"; 
                } 
        if ($mmp>75) {
                    $cl = "green";
                    }
        @endphp

<tr>
                    <td colspan="4" style="background-color:{{$cl}}; font-weight:bold; color:#000;font-size: large;">
                        Cumulative perfomance: {{sprintf('%0.02f',$mmp)}}%
                    </td>
    </tr>


</table>
<h2>SECTION 1. TECHNICAL ACCOMPLISHMENT AGAINST PLAN DURING THE QUARTER </h2>
<table class="table table-bordered">
    <tr style="background: #349ba7 !important;color: #fff;">
        <th>Outcomes | Outputs</th>
        <th>Indicator description</th>
        <th>Baseline</th>
        <th>Total targeted for the quarter</th>
        <th>Achievement for the quarter of {{$qrt}}</th>
        <th>RYGB</th>
    </tr>
    @php
    $y = 1;
    @endphp
    @foreach ($outcomeindicators as $outcomeindicator)

    <tr>
        <td style="color:#0081c3; font-size:bold;">Outcome {{$y}} - 
            
            @foreach ($outcomes as $outcome)
            @if ($outcomeindicator->outcome_id == $outcome->id)
            {!!$outcome->name!!}
            @endif
            @endforeach
           </td>

        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($indicatorsaftergrouped as $indicatoraftergrouped)
                @if ($outcomeindicator->id == $indicatoraftergrouped->indicator_id)
                
                <tr>
                    <td style="padding-left:5px !important;">{!!$outcomeindicator->name!!}</td>
                </tr>
                @endif
                @endforeach
                           </table>
        </td>


        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($indicatorsaftergrouped as $indicatoraftergrouped)
                @if ($outcomeindicator->id == $indicatoraftergrouped->indicator_id)
                <tr>
                    <td>{{$outcomeindicator->baseline_target}}</td>
                </tr>
                @endif
                @endforeach
              
            </table>
        </td>
   
        <td style="padding:0px !important;">

            <table class="table cdcc">
               
                @php
                $tfrg = 0;
                @endphp
                
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($outcomeindicator->id == $indicatorbefore->indicator_id)
                @php
                $tfrg = $tfrg + $indicatorbefore->monthly_total;
                @endphp
               
                @endif
                @endforeach
                <tr>
                    <td>{{$tfrg}}</td>
                </tr>
             
            </table>

        </td>
        <td style="padding:0px !important;">
        
            <table class="table cdcc">
        
                @php
                $tfrg = 0;
                @endphp
        
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                @php
                $tfrg = $tfrg + $indicatorafter->monthly_total;
                @endphp
        
                @endif
                @endforeach
                <tr>
                    <td>{{$tfrg}}</td>
                </tr>
        
            </table>
        
        </td>

      
               
                @php
                $bf = 0;
                $bb = 0;
                @endphp

               @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                @php
                $bf = $bf + $indicatorafter->monthly_total;
                @endphp
                                @endif
                @endforeach
                
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($outcomeindicator->id == $indicatorbefore->indicator_id)
                @php
                    $bb = $bb + $indicatorbefore->monthly_total;
                @endphp
          
                @endif
                @endforeach

                @php
                 
                if ($bb == 0) {
                $bb = 1;
                }  
                $perfom = $bf/$bb * 100;
                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                            $cr = "green";
                            }

                            @endphp
                         

                

                 <td style="padding:0px !important;">
                    <table class="table cdcc">
      <tr>
            <td style="background-color:{{$cr}}; font-weight:bold;color:#000;font-size: large;">
                {{sprintf('%0.02f',$perfom)}}%</td>
        </tr>
            </table>

        </td>

    </tr>
    @php
    $i = 1;
    @endphp

    @foreach ($outputs as $output)
    @if ($outcomeindicator->outcome_id == $output->outcome_id)
    <tr>
        <td><b>Output {{$y}}.{{$i}}</b> - {!!$output->name!!} </td>
        <td style="padding:0px !important;">
          @foreach ($outputindicators as $outputindicator)
          @if ($output->id == $outputindicator->output_id)
              {!!$outputindicator->name!!}
          @endif
              
          @endforeach
            </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsaftergrouped as $indicatorafter)
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
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @php
                $twe1 = 0;
                @endphp
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($outputindicator->id == $indicatorbefore->indicator_id)
                @php
                $twe1 = $twe1 + $indicatorbefore->monthly_total;
                @endphp
        
                @endif
                @endforeach
                @endif
                @endforeach
                <tr>
                    <td>{{$twe1}}</td>
                </tr>
            </table>
        
        
        </td>

<td style="padding:0px !important;">
        <table class="table cdcc">
            @php
                $twe2 = 0;
            @endphp
            @foreach ($outputindicators as $outputindicator)
            @if ($output->id == $outputindicator->output_id)
            @foreach ($indicatorsafter as $indicatorafter)
            @if ($outputindicator->id == $indicatorafter->indicator_id)
            @php
                $twe2 = $twe2 + $indicatorafter->monthly_total;
            @endphp
           
            @endif
            @endforeach
            @endif
            @endforeach
            <tr>
                <td>{{$twe2}}</td>
            </tr>
        </table>

        
    </td>

                 <td style="padding:0px !important;">
                    <table class="table cdcc">
                    @php
                    $cl = "";
                    if ($twe1 > 0) {
                    $mp = $twe2/$twe1*100;
                    }else {
                    $mp = $twe1*100;
                    }
                    if ($mp <26) { $cl="red" ; } if ($mp>25 && $mp <51) { $cl="yellow" ; } if ($mp>50 && $mp <76) { $cl="blue" ; } if ($mp>
                                75) {
                                $cl = "green";
                                }
                                @endphp
                               

                <tr>
                    <td style="background-color:{{$cl}}; font-weight:bold; color:#000;font-size: large;">
                        {{sprintf('%0.02f', $mp)}}%
                    </td>
                </tr>
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