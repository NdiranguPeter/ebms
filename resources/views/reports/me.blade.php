<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Project deriverables</th>
            <th>Intervention Logic: Objective, Result and Activities</th>
            <th>Objectively verifiable indicators (OVI)</th>
            <th>Value of the indicator at project start (base line)</th>
            <th>Baseline</th>
            <th>Project target</th>
            <th>Data source</th>
            <th>Data collection method</th>
            <th>Frequecy</th>
            <th>Responsible</th>
            <th>Total male Year 1</th>
            <th>Total Female Year 1</th>
            <th>Total Beneficiaries</th>

        </tr>
        <thead>
        <tbody>
            @php
            $i =1;
            @endphp
            @foreach ($outcomes as $outcome)
            <tr>
                <th>Outcome {{$i}}</th>
                <th> {!!$outcome->name!!} </th>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        <li> {!!$outcomeindicator->name!!}</li>
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        <li> 0</li>
                        @endif

                        @endforeach
                    </ul>
                </td>

                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        <li> {{$outcomeindicator->baseline_target}}</li>
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        <li> {{$outcomeindicator->baseline_target}}</li>
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outcomeindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->source}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outcomeindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->collection_method}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>

                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outcomeindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->frequency}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outcomeindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->responsibility}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        @foreach ($outcomeindicatorsafter as $outcomeindicatorafter)
                        @if ($outcomeindicatorafter->indicator_id == $outcomeindicator->id)
                        <li> {{$outcomeindicatorafter->total_male}}</li>
                        @endif
                        @endforeach

                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        @foreach ($outcomeindicatorsafter as $outcomeindicatorafter)
                        @if ($outcomeindicatorafter->indicator_id == $outcomeindicator->id)
                        <li> {{$outcomeindicatorafter->total_female}}</li>
                        @endif
                        @endforeach

                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outcomeindicators as $outcomeindicator)
                        @if ($outcomeindicator->outcome_id == $outcome->id)
                        @foreach ($outcomeindicatorsafter as $outcomeindicatorafter)
                        @if ($outcomeindicatorafter->indicator_id == $outcomeindicator->id)
                        <li> {{$outcomeindicatorafter->total_beneficiaries}}</li>
                        @endif
                        @endforeach

                        @endif

                        @endforeach
                    </ul>
                </td>

            </tr>
            @php
            $y = 1;
            @endphp
            @foreach ($outputs as $output)
            @if ($output->outcome_id == $outcome->id)
            <tr>
                <td>output {{$i}}.{{$y}}</td>
                <td> {!!$output->name!!} </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        <li> {!!$outputindicator->name!!}</li>
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        <li> 0</li>
                        @endif

                        @endforeach
                    </ul>
                </td>

                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        <li> {{$outputindicator->baseline_target}}</li>
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        <li> {{$outputindicator->baseline_target}}</li>
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outputindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->source}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outputindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->collection_method}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>

                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outputindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->frequency}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        @foreach ($verificationsources as $verificationsource)
                        @if ($outputindicator->id == $verificationsource->indicator_id)

                        <li> {{$verificationsource->responsibility}}</li>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        @foreach ($outputindicatorsafter as $outputindicatorafter)
                        @if ($outputindicatorafter->indicator_id == $outputindicator->id)
                        <li> {{$outputindicatorafter->total_male}}</li>
                        @endif
                        @endforeach

                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        @foreach ($outputindicatorsafter as $outputindicatorafter)
                        @if ($outputindicatorafter->indicator_id == $outputindicator->id)
                        <li> {{$outputindicatorafter->total_female}}</li>
                        @endif
                        @endforeach

                        @endif

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul style="list-style-type:none;">
                        @foreach ($outputindicators as $outputindicator)
                        @if ($outputindicator->output_id == $output->id)
                        @foreach ($outputindicatorsafter as $outputindicatorafter)
                        @if ($outputindicatorafter->indicator_id == $outputindicator->id)
                        <li> {{$outputindicatorafter->total_beneficiaries}}</li>
                        @endif
                        @endforeach

                        @endif

                        @endforeach
                    </ul>
                </td>

            </tr>
            @php

            $y ++;
            @endphp

            @endif
            @endforeach
            @php
            $i ++;

            @endphp
            @endforeach
        </tbody>
</table>