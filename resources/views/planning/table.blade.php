<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Description of activities</th>
            <th scope="col">Unit</th>
            <th scope="col">Project target</th>
            <th>JAN</th>
            <th>FEB</th>
            <th>MAR</th>
            <th>APR</th>
            <th>MAY</th>
            <th>JUN</th>
            <th>JUL</th>
            <th>AUG</th>
            <th>SEP</th>
            <th>OCT</th>
            <th>NOV</th>
            <th>DEC</th>
        </tr>
    </thead>
    <tbody>
        <?php $i =1;?>
        @foreach ($outputs as $output)
        <?php $y=1;?>
        <tr>
            <th>
                <b> output 1.{{$i}}</b>
            </th>
            <th>
                {!!$output->name!!}
            </th>
            <th>
            </th>
            <th>
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
        </tr>

        @foreach ($activities as $activity)
        {{-- @if ($output->id === $activity->output_id ) --}}
        <tr>
            <td>
                activity 1.{{$i}}.{{$y}}
            </td>
            <td>
                {!!$activity->name!!}
            </td>
            <td>
                {!!$activity->unit!!}
            </td>
            <td>
                {!!$activity->baseline_target!!}
            </td>
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
        <?php $y++; ?>
        {{-- @endif --}}

        @endforeach


        <?php $i++; ?>
        @endforeach

    </tbody>
</table>