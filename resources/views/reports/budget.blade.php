<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Budget code</th>
            <th>Activity Description</th>
            <th>Unit</th>
            <th>#of units</th>
            <th>Cost/Unit</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @if (count($activities)>0)
        @foreach ($activities as $activity)
        <tr style="font-size:smaller;">
            <td> {{$activity->budget_code}} </td>
            <td>{{$activity->name}}</td>
            <td>{{$activity->budget_unit}}</td>
            <td>
                @if ($activity->budget < 1) @php $activity->budget = 1;
                    @endphp
                    @endif
                    @if ($activity->cost_unit < 1) @php $activity->cost_unit = 1;
                        @endphp
                        @endif
                        {{$activity->budget/$activity->cost_unit}}
            </td>
            <td>
                @php
                $number = number_format($activity->cost_unit);
                @endphp
                {{$number}}
            </td>

            <td>
                {{$activity->budget}}
            </td>
        </tr>

        @endforeach

        @else
        <tr>
            <td colspan="5">No activities for this project</td>
        </tr>
        @endif

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>
                @if (count($activities)>0)
                @php
                $tot = 0;
                @endphp
                @foreach ($activities as $activity)
                @php
                $tot = $tot + $activity->budget;
                @endphp
                @endforeach
                @endif
                @php
                $number = number_format($tot);
                @endphp
                {{$number}}

            </td>

        </tr>

    </tbody>


</table>