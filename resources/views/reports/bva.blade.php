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
        @if (count($activities)>0)
        @foreach ($activities as $activity)

        <?php
$budget_diff = $activity->budget - $activity->budget;

$variace = 0;
if ($budget_diff > 0 && $activity->budget >0) {
    $variace = $budget_diff/$activity->budget*100;
}


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
                $number = number_format($activity->budget);

                @endphp
                {{$number}}</td>
            <td>{{$budget_diff}}</td>
            <td>{{$variace}}%</td>
        </tr>

        @endforeach


        @else
        <tr>
            <td colspan="5">No activities for this project</td>
        </tr>
        @endif
    </tbody>


</table>