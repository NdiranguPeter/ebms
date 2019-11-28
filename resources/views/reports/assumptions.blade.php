<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Assumption</th>
            <th>Description</th>
            <th>Reason</th>
            <th>Validation</th>
            <th>Response</th>
            <th>Responsibility</th>
            @if (count($assumptionsafter)>0 && $when == "after")
            <th>Occur</th>
            <th>Impact</th>
            <th>Response</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach ($assumptions as $assumption)
        <tr>
            <td>{{$assumption->name}}</td>
            <td>{!!$assumption->description!!}</td>
            <td>{{$assumption->reason}}</td>
            <td>{{$assumption->validation}}</td>
            <td>{{$assumption->response}}</td>
            <td>{{$assumption->owner}}</td>
            @foreach($assumptionsafter as $assumptionafter)
            @if ($assumptionafter->assumption_id == $assumption->id && $when == "after" )
            <td>{{$assumptionafter->occur}}</td>
            <td>{{$assumptionafter->impact}}</td>
            <td>{{$assumptionafter->response}}</td>
            @endif
            @endforeach

        </tr>
        @endforeach


    </tbody>
</table>
{{$assumptions->links()}}