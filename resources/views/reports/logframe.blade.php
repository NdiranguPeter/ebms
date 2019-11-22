<style>
    #liss li {
        line-height: 25px;
    }
</style>
<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Goal</th>
            <th>Description</th>
            <th>Indicators</th>
            <th>Means of Verification</th>
            <th>Risks</th>
            <th>Assumptions</th>
        </tr>
        <thead>
        <tbody>
            <tr style="font-size: smaller;">
                <td rowspan="{{count($goalindicators)}}">Project goal pp</td>
                <th rowspan="{{count($goalindicators)}}">{!!$project->goal!!}</th>
                <td rowspan="{{count($goalindicators)}}">
                    <table class="table">
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
                <td rowspan="{{count($goalindicators)}}">
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
            <th>
                Outcomes
            </th>
            <th>Description</th>
            <th>Indicators</th>
            <th>Means of Verification</th>
            <th>Risks</th>
            <th>Assumptions</th>
        </tr>
        @php
        $counter = 1;
        @endphp
        @foreach ($outcomes as $outcome)
    <tbody>
        <tr style="font-size: smaller;">
            <td rowspan="{{count($outcomeindicators)}}">Outcome {{$counter}}</td>
            <th rowspan="{{count($outcomeindicators)}}">{!!$outcome->name!!}</th>
            <td>
                <table class="table">
                    @foreach ($outcomeindicators as $outcomeindicator)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    <tr>
                        <td>{!!$outcomeindicator->name!!}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </td>
            <td rowspan="{{count($outcomeindicators)}}">
                <table class="table">

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
                <table class="table">

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
                <table class="table">

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
        <th>
            Outputs
        </th>
        <th>Description</th>
        <th>Indicators</th>
        <th>Means of Verification</th>
        <th>Risks</th>
        <th>Assumptions</th>
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
            <td rowspan="{{count($outputindicators)}}">Output {{$fgrt}}.{{$coer}}</td>
            <th rowspan=" {{count($outputindicators)}}">{!!$output->name!!}</th>
            <td>
                <table class="table">
                    @foreach ($outputindicators as $outputindicator)
                    @if ($outputindicator->output_id == $output->id)
                    <tr>
                        <td>{!!$outputindicator->name!!}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </td>
            <td rowspan="{{count($outputindicators)}}">
                <table class="table">

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
                <table class="table">

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
        <th>
            activities
        </th>
        <th>Activities associated with Outputs</th>
        <th>Resources</th>
        <th style="width:100px;">Budget</th>
        <th>Risks</th>
        <th>Assumptions</th>
    </tr>
    @php
    $fgrt = 1;
    @endphp
    @foreach ($outputs as $output)
    @php
    $cer = 1;
    @endphp
    @foreach ($activities as $activity)
    @if ($output->id == $activity->output_id)

    <tbody>
        <tr style="font-size: smaller;">
            <td rowspan="{{count($activityresources)}}">Activity {{$fgrt}}.{{$cer}}</td>
            <th rowspan="{{count($activityresources)}}">{!!$activity->name!!}</th>
            <td rowspan="{{count($activityresources)}}">
                <table class="table">
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
                {{$activity->budget}}
            </td>
            <td rowspan="{{count($activityresources)}}"></td>
            <td rowspan="{{count($activityresources)}}"></td>
        </tr>
        @php
        $cer++;
        @endphp
    </tbody>
    @endif
    @endforeach
    @php
    $fgrt++;
    @endphp
    @endforeach
</table>