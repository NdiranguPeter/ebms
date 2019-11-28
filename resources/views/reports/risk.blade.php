<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Risk</th>
            <th>Description</th>
            <th>Likelihood</th>
            <th>Impact</th>
            <th>Management strategy</th>
            <th>Responsibility</th>
            @if (count($risksafter)>0 $$ $when == "after")
            <th>Occur</th>
            <th>Response</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach ($risks as $risk)
        <tr>
            <td>{{$risk->name}}</td>
            <td>{!!$risk->description!!}</td>
            <td>{{$risk->likelihood}}</td>
            <td>{{$risk->impact}}</td>
            <td>{{$risk->strategy}}</td>
            <td>{{$risk->owner}}</td>
            @foreach($risksafter as $riskafter)
            @if ($riskafter->risk_id == $risk->id $$ $when == "after" )

            <td>{{$riskafter->occur}}</td>
            <td>{{$riskafter->response}}</td>
            @endif
            @endforeach


        </tr>
        @endforeach
    </tbody>
</table>
{{$risks->links()}}