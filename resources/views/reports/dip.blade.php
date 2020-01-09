<style>
    .fgff td {
        padding: 10px;
    }
</style>
<center><b style="color:#0081c3;">
        DETAILED IMPLEMENTATION PLAN (DIP)

    </b></center>
<div class="col-sm-12" style="padding-bottom:10px; padding-top:10px; padding-left:30px; border: 1px solid #2da0ef;">

    <div class="col-sm-6">
        <p>Project title: <b>{!!$project->name!!}</b></p>
        <p>Implementing Office: <b>{!!$ir_office->name!!}</b></p>
        <p>Donor:
            @foreach ($donors as $donor)
            @foreach ($alldonors as $alldonor)
            @if ($alldonor->id == $donor)
            @php
            $dn = $alldonor->name;
            @endphp
            @endif
            @endforeach
            @endforeach

            <b>{{$dn}}</b></p>
        <p>Sector: <b>{!!$project->sector!!}</b></p>
        <p>Type of project: <b>{!!$project->type!!}</b></p>
    </div>
    <div class="col-sm-6">
        <p>Locattion: <b>{{$project->location}} </b></p>
        <p>Start: <b>January {{$period}} </b></p>
        <p>End: <b>December {{$period}} </b></p>
        @php
        $end = \Carbon\Carbon::parse($project->end);
        $start = \Carbon\Carbon::parse($project->start);
        $diff = $end->diffInMonths($start);
        @endphp
        <p>Duration: <b>{{$diff}}</b> Months</p>
        <p><b>Total beneficiaries: </b>{{$activitiesafter->sum('total_beneficiaries')}}</p>
    </div>

</div>
<table class="fgff table-bordered col-sm-12" style="font-size: smaller;">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th scope="col" style="width:100px;padding-left:5px;">Output</th>
            <th style="min-width: 200px;padding-left:5px;" scope="col">Description of activities</th>
            <th scope="col" style="padding-left:5px;">Unit</th>
            {{-- <th scope="col">Baseline</th> --}}
            <th scope="col" style="padding-left:5px;">Project target</th>
            <th style="padding: 2px;">JAN</th>
            <th style="padding: 2px;">FEB</th>
            <th style="padding: 2px;">MAR</th>
            <th style="padding: 2px;">APR</th>
            <th style="padding: 2px;">MAY</th>
            <th style="padding: 2px;">JUN</th>
            <th style="padding: 2px;">JUL</th>
            <th style="padding: 2px;">AUG</th>
            <th style="padding: 2px;">SEP</th>
            <th style="padding: 2px;">OCT</th>
            <th style="padding: 2px;">NOV</th>
            <th style="padding: 2px;">DEC</th>
            <th style="padding: 2px;">Total </th>
            <th style="padding: 2px;">Responsible</th>
            <th style="padding: 2px;">Budget</th>
            @if ($when == "after")
            <th>Peformance</th>
            @endif
        </tr>
    </thead>

    @php
    $i =1;
    @endphp
    @foreach ($outputs as $output)
    @php
    $y=1;
    @endphp
    <tbody>
        <tr>
            <th style="color:#0081c3; padding-left:5px;"> Output {{$i}}</th>
            <th style="min-width: 200px; padding-left:5px;">
                {!!$output->name!!}
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            @if ($when == "after")
            <th></th>
            @endif
        </tr>
    </tbody>


    @foreach ($activities as $activity)
    @if ($activity->output_id == $output->id)

    <tr>
        <th style="padding-left:5px">
            Activity {{$i}}.{{$y}}
        </th>
        <td style="min-width: 200px;padding-left:5px;">
            {!!$activity->name!!}
        </td>
        <td>
            @foreach ($units as $unit)
            @if ($unit->id == $activity->unit)
            {{$unit->name}}
            @endif
            @endforeach

        </td>
        <td>
            {!!$activity->project_target!!}
        </td>
        @php
        $total = 0;
        @endphp
        @foreach ($activitiesafter as $activityafter)

        @if ($activityafter->activity_id == $activity->id)
        @php
        $total = $total + $activityafter->total_beneficiaries;
        @endphp
        @if ($activityafter->month == 1)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif

        @if ($activityafter->month == 2)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 3)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 4)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 5)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 6)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif

        @if ($activityafter->month == 7)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 8)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 9)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 10)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 11)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @if ($activityafter->month == 12)
        <th>{{$activityafter->total_beneficiaries}}</th>
        @endif
        @endif
        @endforeach
        <th>
            {{$total}}
        </th>
        <th>{{$activity->person_responsible}}</th>
        <th>{{$activity->budget}}</th>
        @if ($when == "after")
        @php
        $perfo = $total/$activity->project_target*100;
        if ($perfo <26) { $color="red" ; } if ($perfo>25 && $perfo <51) { $color="yellow" ; } if ($perfo>50 && $perfo
                <76) { $color="blue" ; } if ($perfo>75) {
                    $color = "green";
                    }
                    @endphp
                    <th style="background-color:{{$color}};color: azure; padding-left:10px;">
                        {{sprintf('%.2f', $perfo)}}%
                    </th>
                    @endif
    </tr>



    <?php $y++; ?>
    @endif
    @endforeach


    <?php $i++; ?>
    @endforeach

    </tbody>
</table>