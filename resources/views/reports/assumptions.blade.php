<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Assumption</th>
            <th>Description</th>
            <th>Reason</th>
            <th>Validation</th>
            <th>Response</th>
            <th>Responsibility</th>
            <th>Assumption occured</th>
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
            <td>Y|N</td>
        </tr>
        @endforeach


    </tbody>
</table>
{{$assumptions->links()}}