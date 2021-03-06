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
<table class="table table-bordered">
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
                <th style="padding:5px; width: 100px;">Goal 1</td>
                <td style="padding:5px;">{!!$project->goal!!}</th>
                <td>
                    <table class="">
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
                    <table>
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
                    <table>
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
                    <table>
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
                <table class="table ">
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
                <table class="table ">

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
                <table class="table ">

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
                <table class="table ">

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
        <th style="padding:5px; width: 250px;">Description</th>
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
            <td style="padding:5px; width: 250px;" rowspan=" {{count($outputindicators)}}">{!!$output->name!!}</th>
            <td>
                <table class="table ">
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
                <table class="table ">

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
                <table class="table ">

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
        <th style="padding:5px;" colspan="3">Activities associated with Outputs</th>
        <th style="padding:5px;">Resources</th>
        <th style="padding:5px;" style="width:100px;">Budget</th>
      
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
            <th rowspan="{{count($activityresources)}}" style="padding-left:5px;">Activity:
                {{$fgrt}}.{{$coer}}.{{$activ}}
                </td>
            <td colspan="3"  style="padding-left:5px;" rowspan="{{count($activityresources)}}">{!!$activity->name!!}</th>
            <td rowspan="{{count($activityresources)}}">
                <table class="table ">
                    @foreach ($activityresources as $activityresource)
                    @if ($activityresource->activity_id == $activity->id)
                    <tr>
                        <td>{!!$activityresource->name!!}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </td>
            <td style="width:100px; padding-left:5px;" rowspan="{{count($activityresources)}}">

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
          
        </tr>

    </tbody>
    @php
    $activ++;

    @endphp
    @endif

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