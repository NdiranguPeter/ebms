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

        @if ($qrt == 'QRT 1')
        @php
        $a = 0;
        $b = 0;
        @endphp
        @foreach ($indicatorsafter as $indicatorafter)
        @php
        $a = $a + $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
        @endphp
        @endforeach

        @foreach ($indicatorsbefore as $indicatorbefore)
        @php
        $b = $b + $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar;
        @endphp
        @endforeach
        @php
        if ($b < 1) { $b=1; } $perfom=$a/$b * 100; if ($perfom <26) { $cr="red" ; } if ($perfom>
            25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                    $cr = "green";
                    }
                    @endphp
                    <td colspan="4" style="background-color:{{$cr}}; font-weight:bold; color:white;">
                        Overall perfomance: {{sprintf('%0.2f',$perfom)}}%
                    </td>
                    @endif

                    @if ($qrt == 'QRT 2')
                    @php
                    $a = 0;
                    $b = 0;
                    @endphp
                    @foreach ($indicatorsafter as $indicatorafter)
                    @php
                    $a = $a + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun;


                    @endphp
                    @endforeach

                    @foreach ($indicatorsbefore as $indicatorbefore)
                    @php
                    $b = $b + $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun;

                    @endphp
                    @endforeach
                    @php

                    if ($b < 1) { $b=1; } $perfom=$a/$b * 100; if ($perfom <26) { $cr="red" ; } if ($perfom>
                        25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                $cr = "green";
                                }
                                @endphp
                                <td colspan="4" style="background-color:{{$cr}}; font-weight:bold; color:white;">
                                    Overall perfomance: {{sprintf('%0.2f',$perfom)}}%
                                </td>

                                @endif

                                @if ($qrt == 'QRT 3')
                                @php
                                $a = 0;
                                $b = 0;
                                @endphp
                                @foreach ($indicatorsafter as $indicatorafter)
                                @php
                                $a = $a + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
                                @endphp
                                @endforeach

                                @foreach ($indicatorsbefore as $indicatorbefore)
                                @php
                                $b = $b + $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep;

                                @endphp
                                @endforeach
                                @php
                                if ($b < 1) { $b=1; } $perfom=$a/$b * 100; if ($perfom <26) { $cr="red" ; } if ($perfom>
                                    25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                            $cr = "green";
                                            }
                                            @endphp
                                            <td colspan="4"
                                                style="background-color:{{$cr}}; font-weight:bold; color:white;">
                                                Overall perfomance: {{sprintf('%0.2f',$perfom)}}%
                                            </td>

                                            @endif

                                            @if ($qrt == 'QRT 4')
                                            @php
                                            $a = 0;
                                            $b = 0;
                                            @endphp
                                            @foreach ($indicatorsafter as $indicatorafter)
                                            @php
                                            $a = $a + $indicatorafter->oct + $indicatorafter->nov +
                                            $indicatorafter->dec;
                                            @endphp
                                            @endforeach

                                            @foreach ($indicatorsbefore as $indicatorbefore)
                                            @php
                                            $b = $b + $indicatorbefore->oct + $indicatorbefore->nov +
                                            $indicatorbefore->dec;
                                            @endphp
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

                                                        @endif

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
    @foreach ($outcomes as $outcome)

    <tr>
        <td style="color:#0081c3; font-size:bold;">Outcome {{$y}} - {!!$outcome->name!!} </td>

        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td style="padding-left:5px !important;">{!!$outcomeindicator->name!!}</td>
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

            <table class="table cdcc">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($outcomeindicator->id == $indicatorbefore->indicator_id)
                @if ($qrt == 'QRT 1')
                <tr>
                    <td>{{$indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 2')
                <tr>
                    <td>{{$indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 3')
                <tr>
                    <td>{{$indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 4')
                <tr>
                    <td>{{$indicatorbefore->oct + $indicatorbefore->nov + $indicatorbefore->dec}}</td>
                </tr>
                @endif
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
                @if ($qrt == 'QRT 1')
                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 2')
                <tr>
                    <td>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</td>

                </tr>
                @endif
                @if ($qrt == 'QRT 3')
                <tr>
                    <td>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 4')
                <tr>
                    <td>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</td>
                </tr>
                @endif
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
                @if ($qrt == 'QRT 1')
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                @php
                $bb = $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar;
                if ($bb == 0) {
                $bb = 1;
                }
                @endphp
                @endif
                @endforeach
                @php
                $bf = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
                $perfom = $bf/$bb * 100;
                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                            $cr = "green";
                            }

                            @endphp
                            <tr>
                                <td style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                    {{sprintf('%0.0f',$perfom)}}%</td>
                            </tr>
                            @endif
                            @if ($qrt == 'QRT 2')
                            @foreach ($indicatorsbefore as $indicatorbefore)
                            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                            @php
                            $bb = $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun;
                            if ($bb == 0) {
                            $bb = 1;
                            }
                            @endphp
                            @endif
                            @endforeach
                            @php
                            $bf = $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun;
                            $perfom = $bf/$bb * 100;
                            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if
                                    ($perfom>50 &&
                                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                        $cr = "green";
                                        }

                                        @endphp
                                        <tr>
                                            <td style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                                {{sprintf('%0.0f',$perfom)}}%</td>
                                        </tr>
                                        @endif
                                        @if ($qrt == 'QRT 3')
                                        @foreach ($indicatorsbefore as $indicatorbefore)
                                        @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                        @php
                                        $bb = $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep;
                                        if ($bb == 0) {
                                        $bb = 1;
                                        }
                                        @endphp
                                        @endif
                                        @endforeach
                                        @php
                                        $bf = $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
                                        $perfom = $bf/$bb * 100;
                                        if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ;
                                                } if ($perfom>50 &&
                                                $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                    $cr = "green";
                                                    }

                                                    @endphp
                                                    <tr>
                                                        <td
                                                            style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                                            {{sprintf('%0.0f',$perfom)}}%</td>
                                                    </tr>
                                                    @endif
                                                    @if ($qrt == 'QRT 4')
                                                    @foreach ($indicatorsbefore as $indicatorbefore)
                                                    @if ($indicatorbefore->indicator_id ==
                                                    $indicatorafter->indicator_id)
                                                    @php
                                                    $bb = $indicatorbefore->oct + $indicatorbefore->nov +
                                                    $indicatorbefore->dec;
                                                    if ($bb == 0) {
                                                    $bb = 1;
                                                    }
                                                    @endphp
                                                    @endif
                                                    @endforeach
                                                    @php
                                                    $bf = $indicatorafter->oct + $indicatorafter->nov +
                                                    $indicatorafter->dec;
                                                    $perfom = $bf/$bb * 100;
                                                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) {
                                                            $cr="yellow" ; } if ($perfom>50 &&
                                                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                $cr = "green";
                                                                }

                                                                @endphp
                                                                <tr>
                                                                    <td
                                                                        style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                                                        {{sprintf('%0.0f',$perfom)}}%</td>
                                                                </tr>
                                                                @endif
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
        <td><b>Output {{$y}}.{{$i}}</b> - {!!$output->name!!} </td>

        <td style="padding:0px !important;">

            <table class="table cdcc">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                <tr>
                    <td style="padding-left:5px !important;">{!!$outputindicator->name!!}</td>
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
            <table class="table cdcc" id="liss" style="padding:0px !important;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($outputindicator->id == $indicatorbefore->indicator_id)
                @if ($qrt == 'QRT 1')
                <tr>
                    <td>{{$indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 2')
                <tr>
                    <td>{{$indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 3')
                <tr>
                    <td>{{$indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 4')
                <tr>
                    <td>{{$indicatorbefore->oct + $indicatorbefore->nov + $indicatorbefore->dec}}</td>
                </tr>
                @endif
                @endif
                @endforeach
                @endif
                @endforeach

            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" id="liss" style="padding:0px !important;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                @if ($qrt == 'QRT 1')
                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 2')
                <tr>
                    <td>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</td>

                </tr>
                @endif
                @if ($qrt == 'QRT 3')
                <tr>
                    <td>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</td>
                </tr>
                @endif
                @if ($qrt == 'QRT 4')
                <tr>
                    <td>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</td>
                </tr>
                @endif
                @endif
                @endforeach
                @endif
                @endforeach

            </table>
        </td>

        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                @if ($qrt == 'QRT 1')
                @foreach ($indicatorsbefore as $indicatorbefore)
                @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                @php
                $bb = $indicatorbefore->jan + $indicatorbefore->feb + $indicatorbefore->mar;
                if ($bb == 0) {
                $bb = 1;
                }
                @endphp
                @endif
                @endforeach
                @php
                $bf = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
                $perfom = $bf/$bb * 100;
                if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if ($perfom>50 &&
                        $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                            $cr = "green";
                            }

                            @endphp
                            <tr>
                                <td style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                    {{sprintf('%0.0f',$perfom)}}%</td>
                            </tr>
                            @endif
                            @if ($qrt == 'QRT 2')
                            @foreach ($indicatorsbefore as $indicatorbefore)
                            @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                            @php
                            $bb = $indicatorbefore->apr + $indicatorbefore->may + $indicatorbefore->jun;
                            if ($bb == 0) {
                            $bb = 1;
                            }
                            @endphp
                            @endif
                            @endforeach
                            @php
                            $bf = $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun;
                            $perfom = $bf/$bb * 100;
                            if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ; } if
                                    ($perfom>50 &&
                                    $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                        $cr = "green";
                                        }

                                        @endphp
                                        <tr>
                                            <td style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                                {{sprintf('%0.0f',$perfom)}}%</td>
                                        </tr>
                                        @endif
                                        @if ($qrt == 'QRT 3')
                                        @foreach ($indicatorsbefore as $indicatorbefore)
                                        @if ($indicatorbefore->indicator_id == $indicatorafter->indicator_id)
                                        @php
                                        $bb = $indicatorbefore->jul + $indicatorbefore->aug + $indicatorbefore->sep;
                                        if ($bb == 0) {
                                        $bb = 1;
                                        }
                                        @endphp
                                        @endif
                                        @endforeach
                                        @php
                                        $bf = $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;
                                        $perfom = $bf/$bb * 100;
                                        if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) { $cr="yellow" ;
                                                } if ($perfom>50 &&
                                                $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                    $cr = "green";
                                                    }

                                                    @endphp
                                                    <tr>
                                                        <td
                                                            style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                                            {{sprintf('%0.0f',$perfom)}}%</td>
                                                    </tr>
                                                    @endif
                                                    @if ($qrt == 'QRT 4')
                                                    @foreach ($indicatorsbefore as $indicatorbefore)
                                                    @if ($indicatorbefore->indicator_id ==
                                                    $indicatorafter->indicator_id)
                                                    @php
                                                    $bb = $indicatorbefore->oct + $indicatorbefore->nov +
                                                    $indicatorbefore->dec;
                                                    if ($bb == 0) {
                                                    $bb = 1;
                                                    }
                                                    @endphp
                                                    @endif
                                                    @endforeach
                                                    @php
                                                    $bf = $indicatorafter->oct + $indicatorafter->nov +
                                                    $indicatorafter->dec;
                                                    $perfom = $bf/$bb * 100;
                                                    if ($perfom <26) { $cr="red" ; } if ($perfom>25 && $perfom <51) {
                                                            $cr="yellow" ; } if ($perfom>50 &&
                                                            $perfom <76) { $cr="blue" ; } if ($perfom>75) {
                                                                $cr = "green";
                                                                }

                                                                @endphp
                                                                <tr>
                                                                    <td
                                                                        style="background-color:{{$cr}}; font-weight:bold;color:white;">
                                                                        {{sprintf('%0.0f',$perfom)}}%</td>
                                                                </tr>
                                                                @endif
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