<style>
    .cdcc td {
        height: 80px;
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
    <tr>
        <td>Total Budget </td>
        <td>{{$project->budget}}</td>
        <td>Total female reached</td>
        <td></td>
    </tr>
    <tr>
        <td>Reporting year</td>
        <td> {{$year}} </td>
        <td>Total male reached</td>
        @php
        $total = 0;
        $gtotal = 0;
        $target_total = 0;
        @endphp
        @foreach ($outputindicators as $outputindicator)
        @php
        $target_total = $target_total + $outputindicator->project_target;
        @endphp
        @endforeach
        @foreach ($indicatorsafter as $indicatorafter)
        @php
        $total1 = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar ;
        $total2 = $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun ;

        $total3 = $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep;

        $total4 = $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;


        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
        + $total = $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
        $gtotal = $gtotal + $total;
        @endphp
        @endforeach
        <td> {{$gtotal}} </td>
    </tr>
    <tr>
        <td>Expenditure for this year</td>
        <td>#</td>
        <td>Total beneficiaries served</td>
        <td>{{$gtotal}}</td>
    </tr>
    <tr>
        <td colspan="4">
            <b>Overall perfomance</b>

            @php
            if ($target_total > 0) {
            $perc = $gtotal/$target_total * 100;
            }else{
            $perc = $gtotal * 100;
            }
            $perc = sprintf('%0.2f', $perc);
            if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 && $perc
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
<h2>SECTION 1. TECHNICAL ACCOMPLISHMENT AGAINST PLAN DURING THE YEAR</h2>
<table class="table table-bordered">
    <tr style="background: #349ba7 !important;color: #fff;">
        <th>Goal | Outcome | Outputs</th>
        <th>Indicator description</th>
        <th>Value at start</th>
        <th>Total targeted for the year</th>
        <th>QRT 1</th>
        <th>QRT 2</th>
        <th>QRT 3</th>
        <th>QRT 4</th>
        <th>Achievement for year {{$year}}</th>
        <th>RYGB</th>
    </tr>
    <tr>
        <td><b>Project Goal </b> - {!!$project->goal!!} </td>

        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{!!$goalindicator->name!!}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" id="liss">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$goalindicator->baseline_target}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>

        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$goalindicator->project_target}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</td>
                </tr>
                @endif
                @endforeach

                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</td>
                </tr>
                @endif
                @endforeach

                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</td>
                </tr>

                @endif
                @endforeach

                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</td>
                </tr>

                @endif
                @endforeach

                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}
                    </td>
                </tr>

                @endif
                @endforeach

                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc">

                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                @php
                if ($goalindicator->project_target == "0") {
                $perc = ($indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may +
                $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep +
                $indicatorafter->oct +
                $indicatorafter->nov + $indicatorafter->dec) * 100;
                }else{
                $perc = ($indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may +
                $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep +
                $indicatorafter->oct +
                $indicatorafter->nov + $indicatorafter->dec) / $goalindicator->project_target * 100;
                }
                $perc = sprintf('%0.2f', $perc);
                if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 &&
                        $perc
                        <75) { $color='blue' ; } if ($perc> 74) {
                            $color = 'green';
                            }
                            @endphp
                            <tr>
                                <td
                                    style=" font-weight: bold; border:1px solid #fff; color:#fff;padding:0px 0px 0px 10px; background-color:{{$color}}">
                                    {{$perc}}%
                                </td>
                            </tr>


                            @endif
                            @endforeach
                            @endif
                            @endforeach
            </table>

        </td>
    </tr>
    @php
    $y = 1;
    @endphp
    @foreach ($outcomes as $outcome)

    <tr>
        <td><b style="color:#0081c3;">Outcome {{$y}}</b>- {!!$outcome->name!!} </td>

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

            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$outcomeindicator->baseline_target}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
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
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</td>
                </tr>

                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>

        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}
                    </td>
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
                @php
                if ($outcomeindicator->project_target == "0") {
                $perc = ($indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may +
                $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep +
                $indicatorafter->oct +
                $indicatorafter->nov + $indicatorafter->dec) * 100;
                }else{
                $perc = ($indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may +
                $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep +
                $indicatorafter->oct +
                $indicatorafter->nov + $indicatorafter->dec) / $outcomeindicator->project_target * 100;
                }
                $perc = sprintf('%0.2f', $perc);
                if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 &&
                        $perc
                        <75) { $color='blue' ; } if ($perc> 74) {
                            $color = 'green';
                            }
                            @endphp
                            <tr>
                                <td
                                    style="font-weight: bold; line-height: 38px; border:1px solid #fff; color:#fff; padding:0px 0px 0px 10px; background-color:{{$color}}">
                                    {{$perc}}%
                                </td>
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
        <td><b style="color:green;">Output {{$y}}.{{$i}} </b> - {!!$output->name!!} </td>

        <td style="padding:0px !important;">
            <table class="table cdcc">
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
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
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
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$outputindicator->project_target}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>

        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td style="padding:0px !important;">
            <table class="table cdcc" style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}
                    </td>
                </tr>
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
                @php
                if ($outputindicator->project_target == "0") {
                $perc = ($indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may +
                $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep +
                $indicatorafter->oct +
                $indicatorafter->nov + $indicatorafter->dec) * 100;
                }else{
                $perc = ($indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may +
                $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep +
                $indicatorafter->oct +
                $indicatorafter->nov + $indicatorafter->dec) / $outputindicator->project_target * 100;
                }
                $perc = sprintf('%0.2f', $perc);
                if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 &&
                        $perc
                        <75) { $color='blue' ; } if ($perc> 74) {
                            $color = 'green';
                            }
                            @endphp
                            <tr>
                                <td
                                    style="font-weight: bold; line-height: 38px; border:1px solid #fff; color:#fff; padding:0px 0px 0px 10px; background-color:{{$color}}">
                                    {{$perc}}%
                                </td>
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