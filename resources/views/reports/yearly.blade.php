<style>
    #liss li {
        line-height: 5px;
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
                            style="border:1px solid #fff; color:#fff; padding:0px 0px 0px 10px; background-color:{{$color}}">
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

        <td>
            <ul>
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)
                <li>{!!$goalindicator->name!!}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul id="liss">
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <li>{{$goalindicator->baseline_target}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>

        </td>
        <td>
            <ul>
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <li>{{$goalindicator->project_target}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul>
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <li>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</li>

                @endif
                @endforeach

                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul>
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <li>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</li>

                @endif
                @endforeach

                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul>
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <li>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</li>

                @endif
                @endforeach

                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul>
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <li>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</li>

                @endif
                @endforeach

                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul>
                @foreach ($goalindicators as $goalindicator)
                @if ($project->id == $goalindicator->goal_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($goalindicator->id == $indicatorafter->indicator_id)

                <li>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}
                </li>

                @endif
                @endforeach

                @endif
                @endforeach
            </ul>
        </td>
        <td>

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
            if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 && $perc
                    <75) { $color='blue' ; } if ($perc> 74) {
                        $color = 'green';
                        }
                        @endphp
                        <div
                            style="border:1px solid #fff; color:#fff;padding:0px 0px 0px 10px; background-color:{{$color}}">
                            {{$perc}}%
                        </div>


                        @endif
                        @endforeach
                        @endif
                        @endforeach

        </td>
    </tr>
    @php
    $y = 1;
    @endphp
    @foreach ($outcomes as $outcome)

    <tr>
        <td><b style="color:#0081c3;">Outcome {{$y}}</b>- {!!$outcome->name!!} </td>

        <td>
            <ul>
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)

                <li>{!!$outcomeindicator->name!!}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>

            <ul style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)

                <li>{{$outcomeindicator->baseline_target}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <li>{{$outcomeindicator->project_target}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</li>

                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>

        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outcomeindicators as $outcomeindicator)
                @if ($outcome->id == $outcomeindicator->outcome_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outcomeindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}
                </li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
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
            if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 && $perc
                    <75) { $color='blue' ; } if ($perc> 74) {
                        $color = 'green';
                        }
                        @endphp
                        <div
                            style="line-height: 38px; border:1px solid #fff; color:#fff; padding:0px 0px 0px 10px; background-color:{{$color}}">
                            {{$perc}}%
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

        </td>

    </tr>

    @php
    $i = 1;
    @endphp
    @foreach ($outputs as $output)
    @if ($outcome->id == $output->outcome_id)

    <tr>
        <td><b style="color:green;">Output {{$y}}.{{$i}} </b> - {!!$output->name!!} </td>

        <td>
            <ul>
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)

                <li>{!!$outputindicator->name!!}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)

                <li>{{$outputindicator->baseline_target}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>

        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)

                <li>{{$outputindicator->project_target}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>

        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}</li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
            <ul style="line-height: 40px;">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <li>{{$indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr + $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep + $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec}}
                </li>
                @endif
                @endforeach
                @endif
                @endforeach
            </ul>
        </td>
        <td>
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
            if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 && $perc
                    <75) { $color='blue' ; } if ($perc> 74) {
                        $color = 'green';
                        }
                        @endphp
                        <div
                            style="line-height: 38px; border:1px solid #fff; color:#fff; padding:0px 0px 0px 10px; background-color:{{$color}}">
                            {{$perc}}%
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

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