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
            <tr>
                <td rowspan="{{count($goalindicators)}}">Project goal</td>
                <th rowspan="{{count($goalindicators)}}">{!!$project->goal!!}</th>
                <td rowspan="{{count($goalindicators)}}">
                    <ul>
                        @php
                        $y = 1;
                        @endphp
                        @foreach ($goalindicators as $goalindicator)
                        <li>{!!$goalindicator->name!!}</li>

                        @php
                        $y++;
                        @endphp
                        @endforeach
                    </ul>
                </td>
                <td rowspan="{{count($goalindicators)}}">
                    <ul style="line-height: 40px;">
                        @php
                        $y = 1;
                        @endphp
                        @foreach ($goalindicators as $goalindicator)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($verificationsource->indicator_id == $goalindicator->id)
                        <li>{!!$verificationsource->name!!}</li>
                        @endif

                        @endforeach
                        @php
                        $y++;
                        @endphp
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($goalindicators as $goalindicator)
                        @foreach ($risks as $risk)
                        @if($goalindicator->goal_id == $risk->goal_id)
                        <li>
                            {{$risk->name}}
                        </li>
                        @endif
                        @endforeach
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($goalindicators as $goalindicator)
                        @foreach ($assumptions as $assumption)
                        @if($goalindicator->goal_id == $assumption->goal_id)
                        <li>
                            {{$assumption->name}}
                        </li>
                        @endif
                        @endforeach
                        @endforeach
                    </ul>
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
        <tr>
            <td rowspan="{{count($outcomeindicators)}}">Outcome {{$counter}}</td>
            <th rowspan="{{count($outcomeindicators)}}">{!!$outcome->name!!}</th>
            <td>
                <ul>
                    @foreach ($outcomeindicators as $outcomeindicator)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    <li> {!!$outcomeindicator->name!!} </li>

                    @endif
                    @endforeach
                </ul>
            </td>
            <td rowspan="{{count($outcomeindicators)}}">
                <ul style="line-height: 40px;">

                    @foreach ($outcomeindicators as $outcomeindicator)
                    @foreach ($verificationsources as $verificationsource)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    @if ($outcomeindicator->id == $verificationsource->indicator_id)
                    <li>{{$verificationsource->source}}</li>
                    @endif
                    @endif
                    @endforeach

                    @endforeach
                </ul>
            </td>
            <td>
                <ul>

                    @foreach ($outcomeindicators as $outcomeindicator)
                    @foreach ($risks as $risk)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    @if($outcomeindicator->outcome_id == $risk->outcome_id)

                    <li> {{$risk->name}} </li>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </ul>
            </td>
            <td>
                <ul>

                    @foreach ($outcomeindicators as $outcomeindicator)
                    @foreach ($assumptions as $assumption)
                    @if ($outcomeindicator->outcome_id == $outcome->id)
                    @if($outcomeindicator->outcome_id == $assumption->outcome_id)

                    <li> {{$assumption->name}} </li>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </ul>
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
        <tr>
            <td rowspan="{{count($outputindicators)}}">Output {{$fgrt}}.{{$coer}}</td>
            <th rowspan=" {{count($outputindicators)}}">{!!$output->name!!}</th>
            <td>
                <ul>
                    @foreach ($outputindicators as $outputindicator)
                    @if ($outputindicator->output_id == $output->id)
                    <li> {!!$outputindicator->name!!} </li>
                    @endif
                    @endforeach
                </ul>
            </td>
            <td rowspan="{{count($outputindicators)}}">
                <ul style="line-height: 50px;">

                    @foreach ($outputindicators as $outputindicator)
                    @foreach ($verificationsources as $verificationsource)
                    @if ($outputindicator->output_id == $output->id)
                    @if ($outputindicator->id == $verificationsource->indicator_id)
                    <li>{{$verificationsource->source}}</li>
                    @endif
                    @endif
                    @endforeach

                    @endforeach
                </ul>
            </td>
            <td>
                <ul style="line-height: 45px;">

                    @foreach ($risks as $risk)
                    @foreach ($outputindicators as $outputindicator)
                    @if ($outputindicator->output_id == $output->id)
                    @if($outputindicator->output_id == $risk->output_id)
                    <li> {{$risk->name}} </li>
                    @endif
                    @endif
                    @endforeach

                    @endforeach
                </ul>
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
        <tr>
            <td rowspan="{{count($activityresources)}}">Activity {{$fgrt}}.{{$cer}}</td>
            <th rowspan="{{count($activityresources)}}">{!!$activity->name!!}</th>
            <td rowspan="{{count($activityresources)}}">
                <ul>
                    @foreach ($activityresources as $activityresource)
                    @if ($activityresource->activity_id == $activity->id)
                    <li>{!!$activityresource->name!!}</li>
                    @endif
                    @endforeach
                </ul>
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