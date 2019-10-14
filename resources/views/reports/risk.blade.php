<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Risk</th>
            <th>Description</th>
            <th>Likelihood</th>
            <th>Impact</th>
            <th>Management strategy</th>
            <th>Responsibility</th>
            <th>Risk occur</th>
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
            <td>Y|N</td>
        </tr>
        @endforeach


    </tbody>
</table>
{{$risks->links()}}