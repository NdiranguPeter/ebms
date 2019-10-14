<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>#</th>
            <th>Organization</th>
            <th>Acronym</th>
            <th>Type</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $count = 1;
        ?>
        @foreach ($partners as $partner)
        <tr>
            <td> {{$count}} </td>
            <td> {{$partner->name}} </td>
            <td>{{$partner->acronym}}</td>
            <td>{{$partner->type}}</td>
            <td>{{$partner->role}}</td>
        </tr>
        <?php 
            $count++;
        ?>
        @endforeach


    </tbody>
</table>