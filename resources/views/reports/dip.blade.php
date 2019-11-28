<style>
    .fgff td {
        padding: 10px;
    }
</style>
<center><b style="color:#0081c3;">
        DETAILED IMPLEMENTATION PLAN (DIP)

    </b></center>
<div class="col-sm-12" style="padding:50px; border: 1px solid #2da0ef;">

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
        <p>Start: <b>{{$project->start}} </b></p>
        <p>End: <b>{{$project->end}} </b></p>
        @php
        $end = \Carbon\Carbon::parse($project->end);
        $start = \Carbon\Carbon::parse($project->start);
        $diff = $end->diffInMonths($start);
        @endphp
        <p>Duration: <b>{{$diff}}</b> Months</p>
        <p><b>Total beneficiaries: </b>{{$activities->sum('total_beneficiaries')}}</p>
    </div>
</div>

<table class="fgff table-bordered" style="font-size: smaller;">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th scope="col" style="width:100px;">Output</th>
            <th style="min-width: 200px;" scope="col">Description of activities</th>
            <th scope="col">Unit</th>
            {{-- <th scope="col">Baseline</th> --}}
            <th scope="col">Project target</th>
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
        </tr>
    </thead>
    <tbody>
        <?php $i =1;?>

        @foreach ($outputs as $output)
    <tbody>
        <tr>
            <th style="color:#0081c3;">output {{$i}}</th>
            <th style="min-width: 200px;">
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

        </tr>
    </tbody>
    @php
    $y=1;
    @endphp
    @foreach ($activities as $activity)
    @if ($activity->output_id == $output->id)
    @foreach ($activitiesafter as $activityafter)
    @if ($activityafter->activity_id === $activity->id)
    <tbody>
        <tr>
            <th>
                <b> activity {{$i}}.{{$y}}</b>
            </th>
            <td style="min-width: 200px;">
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



            <th> {{$activityafter->jan}}</th>

            <th> {{$activityafter->feb}}</th>

            <th> {{$activityafter->mar}}</th>

            <th> {{$activityafter->apr}}</th>

            <th> {{$activityafter->may}}</th>

            <th> {{$activityafter->jun}}</th>

            <th> {{$activityafter->jul}}</th>

            <th>{{$activityafter->aug}}</th>

            <th> {{$activityafter->sep}}</th>

            <th> {{$activityafter->oct}}</th>

            <th> {{$activityafter->nov}}</th>

            <th> {{$activityafter->dec}}</th>

            @php
            $total_reached = $activityafter->jan + $activityafter->feb + $activityafter->mar + $activityafter->apr +
            $activityafter->may + $activityafter->jun + $activityafter->jul + $activityafter->aug +
            $activityafter->sep + $activityafter->oct + $activityafter->nov + $activityafter->dec;
            @endphp
            <th> {{$total_reached}}</th>

            <th> {{$activityafter->person_responsible}}</th>

            <th style="width:100px;"> {{$activityafter->budget}}</th>


        </tr>
    </tbody>
    <?php $y++; ?>
    @endif
    @endforeach
    @endif
    @endforeach

    <?php $i++; ?>
    @endforeach

    </tbody>
</table>