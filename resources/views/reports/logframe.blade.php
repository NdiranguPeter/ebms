<style>
    .cdccw td {
        height: 88px;
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
<table class="cdcc table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th style="padding:5px;">Goal</th>
            <th style="padding:5px;">Description</th>
            <th style="padding:5px;">Indicators</th>
            <th style="padding:5px;">Means of Verification</th>
            <th style="padding:5px;">Risks</th>
            <th style="padding:5px;">Assumptions</th>
        </tr>
        <thead>
        <tbody>
            <tr style="font-size: smaller;">
                <th style="padding:5px;">{!!$project->goal!!}</td>
                <td style="padding:5px;">{!!$project->description!!}</th>
                <td>
                    <table class="table cdccw">
                        @php
                        $y = 1;
                        @endphp
                        @foreach ($goalindicators as $goalindicator)
                        <tr>
                            <td>{!!$goalindicator->name!!}</td>
                        </tr>
                        @php
                        $y++;
                        @endphp
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table">
                        @php
                        $y = 1;
                        @endphp
                        @foreach ($goalindicators as $goalindicator)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($verificationsource->indicator_id == $goalindicator->id)
                        <tr>
                            <td>{!!$verificationsource->name!!}</td>
                        </tr>
                        @endif

                        @endforeach
                        @php
                        $y++;
                        @endphp
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table">
                        @foreach ($goalindicators as $goalindicator)
                        @foreach ($risks as $risk)
                        @if($goalindicator->goal_id == $risk->goal_id)
                        <tr>
                            <td>{{$risk->name}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table">
                        @foreach ($goalindicators as $goalindicator)
                        @foreach ($assumptions as $assumption)
                        @if($goalindicator->goal_id == $assumption->goal_id)
                        <tr>
                            <td>{{$assumption->name}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </table>
                </td>
            </tr>

        </tbody>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th style="padding:5px;">Outcomes</th>
            <th style="padding:5px;">Description</th>
            <th style="padding:5px;">Indicators</th>
            <th style="padding:5px;">Means of Verification</th>
            <th style="padding:5px;">Risks</th>
            <th style="padding:5px;">Assumptions</th>
        </tr>
        @php
        $counter = 1;
        @endphp
        @foreach ($outcomes as $outcome)
    <tbody>
        <tr style="font-size: smaller;">
            <th style="padding:5px;">Outcome {{$counter}}</td>
            <td style="padding:5px;">{!!$outcome->name!!}</th>
            <td>
                <table class="table cdccw">
                    @foreach ($outcomeindicators as $outcomeindicator)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    <tr>
                        <td>{!!$outcomeindicator->name!!}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </td>
            <td>
                <table class="table cdccw">

                    @foreach ($outcomeindicators as $outcomeindicator)
                    @foreach ($verificationsources as $verificationsource)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    @if ($outcomeindicator->id == $verificationsource->indicator_id)
                    <tr>
                        <td>
                            {{$verificationsource->source}}
                        </td>
                    </tr>
                    @endif
                    @endif
                    @endforeach

                    @endforeach
                </table>
            </td>
            <td>
                <table class="table cdccw">

                    @foreach ($outcomeindicators as $outcomeindicator)
                    @foreach ($risks as $risk)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    @if($outcomeindicator->outcome_id == $risk->outcome_id)
                    <tr>
                        <td>{{$risk->name}}</td>
                    </tr>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </table>
            </td>
            <td>
                <table class="table cdccw">

                    @foreach ($outcomeindicators as $outcomeindicator)
                    @foreach ($assumptions as $assumption)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    @if($outcomeindicator->outcome_id == $assumption->outcome_id)
                    <tr>
                        <td>{{$assumption->name}}</td>
                    </tr>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </table>
            </td>
        </tr>

        @php
        $counter++;
        @endphp
        @endforeach

    </tbody>
    <tr style="background: #349ba7 !important;color: #fff;">
        <th style="padding:5px;"> Outputs </th>
        <th style="padding:5px;">Description</th>
        <th style="padding:5px;">Indicators</th>
        <th style="padding:5px;">Means of Verification</th>
        <th style="padding:5px;">Risks</th>
        <th style="padding:5px;">Assumptions</th>
    </tr>
    @php
    $fgrt = 1;
    @endphp
    @foreach ($outcomes as $outcome)
    @php
    $coer = 1;
    @endphp
    @foreach ($outputs as $output)
    @if ($outcome->id == $output->outcome_id)
    <tbody>
        <tr style="font-size: smaller;">
            <th style="padding:5px;">Output {{$fgrt}}.{{$coer}}</td>
            <td style="padding:5px;" rowspan=" {{count($outputindicators)}}">{!!$output->name!!}</th>
            <td>
                <table class="table cdccw">
                    @foreach ($outputindicators as $outputindicator)
                    @if ($outputindicator->output_id == $output->id)
                    <tr>
                        <td>{!!$outputindicator->name!!}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </td>
            <td>
                <table class="table cdccw">

                    @foreach ($outputindicators as $outputindicator)
                    @foreach ($verificationsources as $verificationsource)
                    @if ($outputindicator->output_id == $output->id)
                    @if ($outputindicator->id == $verificationsource->indicator_id)
                    <tr>
                        <td>{{$verificationsource->source}}</td>
                    </tr>
                    @endif
                    @endif
                    @endforeach

                    @endforeach
                </table>
            </td>
            <td>
                <table class="table cdccw">

                    @foreach ($risks as $risk)
                    @foreach ($outputindicators as $outputindicator)
                    @if ($outputindicator->output_id == $output->id)
                    @if($outputindicator->output_id == $risk->output_id)
                    <tr>
                        <td>{{$risk->name}}</td>
                    </tr>
                    @endif
                    @endif
                    @endforeach

                    @endforeach
                </table>
            </td>
            <td></td>
        </tr>
    </tbody>
    @php
    $coer++;

    @endphp
    @endif

    @endforeach
    @php
    $fgrt++;
    @endphp
    @endforeach


    <tr style="background: #349ba7 !important;color: #fff;">
        <th style="padding:5px;">Activities </th>
        <th style="padding:5px;">Activities associated with Outputs</th>
        <th style="padding:5px;">Resources</th>
        <th style="padding:5px;" style="width:100px;">Budget</th>
        <th style="padding:5px;">Risks</th>
        <th style="padding:5px;">Assumptions</th>
    </tr>

    @php
    $fgrt = 1;
    @endphp
    @foreach ($outcomes as $outcome)
    @php
    $coer = 1;
    @endphp
    @foreach ($outputs as $output)
    @if ($outcome->id == $output->outcome_id)
    @php
    $activ = 1;
    @endphp
    @foreach ($activities as $activity)
    @if ($output->id == $activity->output_id)

    <tbody>
        <tr style="font-size: smaller;">
            <th rowspan="{{count($activityresources)}}">Activity: {{$fgrt}}.{{$coer}}.{{$activ}}</td>
            <td style="padding-left:5px;" rowspan="{{count($activityresources)}}">{!!$activity->name!!}</th>
            <td rowspan="{{count($activityresources)}}">
                <table class="table cdccw">
                    @foreach ($activityresources as $activityresource)
                    @if ($activityresource->activity_id == $activity->id)
                    <tr>
                        <td>{!!$activityresource->name!!}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </td>
            <td style="width:100px;" rowspan="{{count($activityresources)}}">

                @foreach ($curs as $curr)
                @if ($activity->currency == $curr->id)
                {{$curr->symbol}}.
                @endif
                @endforeach
                @php
                $number = number_format($activity->budget);

                @endphp
                {{$number}}

            </td>
            <td rowspan="{{count($activityresources)}}"></td>
            <td rowspan="{{count($activityresources)}}"></td>
        </tr>

    </tbody>
    @endif
    @php
    $activ++;

    @endphp
    @endforeach

    @php
    $coer++;

    @endphp
    @endif

    @endforeach
    @php
    $fgrt++;
    @endphp
    @endforeach




</table>