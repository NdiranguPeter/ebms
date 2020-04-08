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
        $dy = 0;
        @endphp



        @if (count($activities)>0)
        @foreach ($activities as $activity)

        @foreach ($activitiesafter as $activityafter)

        @if ($activity->id == $activityafter->activity_id)

       

        <?php
       
$budget_diff = $activityafter->budget - $activity->budget;

    $variance = $budget_diff/$activity->budget*100;

$dy = $activityafter->budget;

            ?>

            @endif
            
            @endforeach
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
                $number = number_format($dy);

                @endphp
                {{$number}}</td>
            <td>{{number_format($budget_diff)}}</td>
           
            @if ($variance >= 0)
            <td style="background-color:green; font-weight:bold;color:white;">{{sprintf('%0.2f',$variance)}}%</td>
            @endif
            @if ($variance < 0) <td style="background-color:red; font-weight:bold;color:white;">
                {{sprintf('%0.2f', $variance)}}%</td>
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