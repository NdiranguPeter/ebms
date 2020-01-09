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
    @php
    $total = 0;
    $target_total = 0;
    @endphp
    @foreach ($indicatorsafter as $indicatorafter)
    @php
    if($month == 'January'){
    $total = $indicatorafter->jan;
    }
    if($month == 'February'){
    $total = $indicatorafter->jan + $indicatorafter->feb;
    }
    if($month == 'March'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
    }
    if($month == 'April'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
    }
    if($month == 'May'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may;
    }
    if($month == 'June'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun;
    }if($month == 'July'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul;
    }if($month == 'August'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
    }if($month == 'September'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
    $indicatorafter->sep;
    }if($month == 'October'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
    + $indicatorafter->oct;
    }if($month == 'November'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
    +
    $indicatorafter->oct + $indicatorafter->nov;
    }
    if($month == 'December'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
    +
    $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
    }
    @endphp
    @endforeach
    <tr>
        <td>Total Budget </td>
        <th>{{$project->budget}}</th>
        <td>Total female reached</th>
        <th>{{$total}}</td>
    </tr>
    <tr>
        <td>Reporting month</td>
        <th> {{$month}} </th>
        <td>Total male reached</td>

        <th> {{$total}} </th>
    </tr>
    <tr>
        <td>Expenditure for this month</td>
        <th>
            @php
            $exp = 0;
            @endphp
            @foreach ($indicatorsafter as $indicatorafter)
            @php
            $exp = $exp++;
            @endphp
            @endforeach

            {{$exp}}
        </th>
        <td>Total beneficiaries served</td>
        <th>{{$total}}</th>
    </tr>
    <tr>
        @php
        $a = 0;
        $b = 0;
        @endphp
        @foreach ($outputs as $output)
      @foreach ($outputindicators as $outputindicator)
        @if ($output->id == $outputindicator->output_id)
        @foreach ($indicatorsbefore as $indicatorbefore)
        @if ($outputindicator->id == $indicatorbefore->indicator_id)
        @if ($month == "January")
        @php
            $b = $b + $indicatorbefore->jan;
        @endphp
        @endif
        @if ($month == "February")
        @php
        $b = $b + $indicatorbefore->jan + $indicatorbefore->feb;
        @endphp
        @endif

@if ($month == "March")
@php
$b = $b + $indicatorbefore->jan  + $indicatorbefore->feb + $indicatorbefore->mar;
@endphp
@endif


@if ($month == "April")
@php
$b = $b + $indicatorbefore->jan  + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr;
@endphp
@endif

@if ($month == "May")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may;
@endphp
@endif

@if ($month == "June")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun;
@endphp
@endif

@if ($month == "July")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun + $indicatorbefore->jul;
@endphp
@endif

@if ($month == "August")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug;
@endphp
@endif

@if ($month == "September")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep;
@endphp
@endif

@if ($month == "October")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep + $indicatorbefore->oct;
@endphp
@endif

@if ($month == "November")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep
+ $indicatorbefore->oct + $indicatorbefore->nov;
@endphp
@endif

@if ($month == "December")
@php
$b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep
+ $indicatorbefore->oct + $indicatorbefore->nov + $indicatorbefore->dec;
@endphp
@endif


        @endif
        @endforeach
        @endif
        @endforeach
        @endforeach


        @foreach ($outputs as $output)
        @foreach ($outputindicators as $outputindicator)
        @if ($output->id == $outputindicator->output_id)
        @foreach ($indicatorsafter as $indicatorafter)
        @if ($outputindicator->id == $indicatorafter->indicator_id)
        @if ($month == "January")
        @php
        $a = $a + $indicatorafter->jan;
        @endphp
        @endif
        @if ($month == "February")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb;
        @endphp
        @endif
        
        @if ($month == "March")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
        @endphp
        @endif
        
        
        @if ($month == "April")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
        @endphp
        @endif
        
        @if ($month == "May")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may;
        @endphp
        @endif
        
        @if ($month == "June")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun;
        @endphp
        @endif
        
        @if ($month == "July")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul;
        @endphp
        @endif
        
        @if ($month == "August")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
        @endphp
        @endif
        
        @if ($month == "September")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
        @endphp
        @endif
        
        @if ($month == "October")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep +
        $indicatorafter->oct;
        @endphp
        @endif
        
        @if ($month == "November")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
        + $indicatorafter->oct + $indicatorafter->nov;
        @endphp
        @endif
        
        @if ($month == "December")
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
        + $indicatorafter->oct + $indicatorafter->nov + $indicatorbefore->dec;
        @endphp
        @endif
        
        
        @endif
        @endforeach
        @endif
        @endforeach
        @endforeach




                                            @php
                                            if ($b < 1) { $b=1; } $perfom=$a/$b * 100; if ($perfom <26) { $cr="red" ; }
                                                if ($perfom>
                                                25 &&
                                                $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                        $cr = "green";
                                                        }
                                                        @endphp
                                                        <td colspan="4"
                                                            style="background-color:{{$cr}}; font-weight:bold; color:white;">
                                                            Overall perfomance: {{sprintf('%0.2f',$perfom)}}%
                                                        </td>


    </tr>
</table>

<h2>SECTION 1. TECHNICAL ACCOMPLISHMENT AGAINST PLAN DURING THE MONTH</h2>
<table class="cdcc table table-bordered">
    <tr style="background: #349ba7 !important;color: #fff;">
        <th style="max-width:200px;padding: 8px;">Outputs</th>
        <th style="max-width:600px;padding: 8px;">Indicator description</th>
        <th style="padding: 8px;">Value at start</th>
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