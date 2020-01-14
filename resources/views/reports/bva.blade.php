<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Budget code</th>
            <th>Activity Description</th>
            <th>Total Budget</th>
            <th>Spent Budget</th>
            <th>Variance</th>
            <th>% Variance</th>
        </tr>
    </thead>
    <tbody>
        @php
        $dy = 91000;
        @endphp
        @if (count($activities)>0)
        @foreach ($activities as $activity)

        <?php
       
$budget_diff = $activity->budget - ($activity->budget-$dy);

    $variace = $budget_diff/$activity->budget*100;

$dy = $dy - 9232;

            ?>
        <tr>
            <td> {{$activity->budget_code}} </td>
            <td>{{$activity->name}}</td>
            <td>
                @php
                $number = number_format($activity->budget);

                @endphp
                {{$number}}
            </td>
            <td>
                @php
                $number = number_format($activity->budget-$dy);

                @endphp
                {{$number}}</td>
            <td>{{number_format($budget_diff)}}</td>
            @if ($variace> 0)
            <td style="background-color:green; font-weight:bold;color:white;">{{sprintf('%0.2f',$variace)}}%</td>
            @endif
            @if ($variace < 0) <td style="background-color:red; font-weight:bold;color:white;">
                {{sprintf('%0.2f',$variace)}}%</td>
                @endif
        </tr>

        @endforeach


        @else
        <tr>
            <td colspan="5">No activities for this project</td>
        </tr>
        @endif
    </tbody>


</table>