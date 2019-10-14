<table>
    <thead>
        <tr>
            <th>Outcomes</th>
            <th>Indicators</th>
            <th>Verification source</th>
        </tr>
        <thead>
        <tbody>
            @foreach ($outcomes as $outcome)
            <tr>
                <td> {{$outcome->name}} </td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Outputs</th>
            <th>Indicators</th>
            <th>Verification source</th>
        </tr>
        <thead>
        <tbody>
            @foreach ($outputs as $output)
            <tr>
                <td> {{$output->name}} </td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Activities</th>
            <th>Indicators</th>
            <th>Verification source</th>
        </tr>
        <thead>
        <tbody>
            @foreach ($activities as $activity)


            <tr>
                <td> {{$activity->name}} </td>
                <td></td>
                <td></td>
            </tr>

            @endforeach
        </tbody>
</table>