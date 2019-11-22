<table class="table table-bordered">
    <tbody>
        <tr style="background: #349ba7 !important;color: #fff;">
            <td width="634">
                <p>Activity</p>
            </td>
            <td width="234">
                <p>Age group</p>
            </td>
            <td width="234">
                <p>male</p>
            </td>
            <td width="234">
                <p>female</p>
            </td>
            <td width="234">Total</td>
        </tr>
        @php
        $grand_total_under_five_male = 0;
        $grand_total_under_five_female = 0;

        $grand_tota_six_eighteen_male =0;
        $grand_tota_six_eighteen_female =0;

        $grand_tota_nineteen_fifty_male =0;
        $grand_tota_nineteen_fifty_female =0;

        $grand_tota_over_fifty_male =0;
        $grand_tota_over_fifty_female =0;



        @endphp
        @foreach ($activities as $activity)
        <?php
         $tota_under_five_male = $activity->zero_two_male + $activity->three_five_male;
            $tota_under_five_female = $activity->zero_two_female + $activity->three_five_female;
                    
            $total_under_five = $tota_under_five_male + $tota_under_five_female;

                    $tota_six_eighteen_male = $activity->six_twelve_male + $activity->thirteen_seventeen_male;
                    $tota_six_eighteen_female = $activity->six_twelve_female + $activity->thirteen_seventeen_female;
                    
            $tota_six_eighteen = $tota_six_eighteen_male + $tota_six_eighteen_female;

                    $tota_nineteen_fifty_male = $activity->eigteen_twentyfive_male + $activity->twentysix_fourtynine_male;
                    $tota_nineteen_fifty_female = $activity->eigteen_twentyfive_female + $activity->twentysix_fourtynine_female;
                    
            $tota_nineteen_fifty = $tota_nineteen_fifty_male + $tota_nineteen_fifty_female;
                    
                    $tota_over_fifty_male = $activity->fifty_fiftynine_male + $activity->sixty_sixtynine_male + $activity->seventy_seventynine_male + $activity->above_eighty_male;
                    $tota_over_fifty_female = $activity->fifty_fiftynine_female + $activity->sixty_sixtynine_female + $activity->seventy_seventynine_female + $activity->above_eighty_female;
            $tota_over_fifty = $tota_over_fifty_male + $tota_over_fifty_female;              
            $total_male = $tota_under_five_male + $tota_six_eighteen_male + $tota_nineteen_fifty_male + $tota_over_fifty_male; 
            $total_female = $tota_under_five_female + $tota_six_eighteen_female + $tota_nineteen_fifty_female + $tota_over_fifty_female; 
        
        $grand_total = $total_male + $total_female;

        $grand_total_under_five_male = $grand_total_under_five_male + $tota_under_five_male;
        $grand_total_under_five_female = $grand_total_under_five_female + $tota_under_five_female;
 
        $grand_tota_six_eighteen_male = $grand_tota_six_eighteen_male + $tota_six_eighteen_male;
        $grand_tota_six_eighteen_female = $grand_tota_six_eighteen_female + $tota_six_eighteen_female;

        $grand_tota_nineteen_fifty_male = $grand_tota_nineteen_fifty_male + $tota_nineteen_fifty_male;
        $grand_tota_nineteen_fifty_female = $grand_tota_nineteen_fifty_female + $tota_nineteen_fifty_female;
        
        $grand_tota_over_fifty_male = $grand_tota_over_fifty_male + $tota_over_fifty_male;
        $grand_tota_over_fifty_female = $grand_tota_over_fifty_female + $tota_over_fifty_female;
        
        
        $all_total = $grand_total_under_five_male + $grand_total_under_five_female + $grand_tota_six_eighteen_male
        + $grand_tota_six_eighteen_female + $grand_tota_nineteen_fifty_male + $grand_tota_nineteen_fifty_female
        + $grand_tota_over_fifty_male + $grand_tota_over_fifty_female;

        $all_total_male = $grand_total_under_five_male + $grand_tota_six_eighteen_male
        + $grand_tota_nineteen_fifty_male + $grand_tota_over_fifty_male;

        $all_total_female = $grand_total_under_five_female + $grand_tota_six_eighteen_female
        + $grand_tota_nineteen_fifty_female + $grand_tota_over_fifty_female;
        ?>
        <tr style="font-size:smaller;">
            <td rowspan="5" width="234">
                <p> {{$activity->name}} </p>
            </td>
            <td width="234">
                <p>&lt;5</p>
            </td>
            <td width="234">
                <p> {{$tota_under_five_male}} </p>
            </td>
            <td width="234">
                <p> {{$tota_under_five_female}}</p>
            </td>
            <td>{{$total_under_five}}</td>
        </tr>
        <tr>
            <td width="234">
                <p>6-18</p>
            </td>
            <td width="234">
                <p> {{$tota_six_eighteen_male}} </p>
            </td>
            <td width="234">
                <p> {{$tota_six_eighteen_female}}</p>
            </td>
            <td> {{$tota_six_eighteen}} </td>
        </tr>
        <tr>
            <td width="234">
                <p>19-50</p>
            </td>
            <td width="234">
                <p> {{$tota_nineteen_fifty_male}} </p>
            </td>
            <td width="234">
                <p> {{$tota_nineteen_fifty_female}}</p>
            </td>
            <td> {{$tota_nineteen_fifty}} </td>
        </tr>
        <tr>
            <td width="234">
                <p>&gt;50</p>
            </td>
            <td width="234">
                <p> {{$tota_over_fifty_male}} </p>
            </td>
            <td width="234">
                <p> {{$tota_over_fifty_female}}</p>
            </td>
            <td> {{$tota_over_fifty}} </td>
        </tr>
        <tr>

            <td>
                <b>Total</b>
            </td>
            <td width="234">
                <p> {{$total_male}} </p>
            </td>
            <td width="234">
                <p> {{$total_female}}</p>
            </td>
            <td> <b>{{$grand_total}} </b></td>

        </tr>

        @endforeach
        <tr style="background: #349ba7 !important;color: #fff;">
            <td width="634">
                <p>Activity</p>
            </td>
            <td width="234">
                <p>Age group</p>
            </td>
            <td width="234">
                <p>male</p>
            </td>
            <td width="234">
                <p>female</p>
            </td>
            <td width="234">Total</td>
        </tr>
        <tr>
            <td rowspan="5" width="234">
                <p> All activities summary </p>
            </td>
            <td width="234">
                <p>&lt;5</p>
            </td>
            <td width="234">
                <p> {{$grand_total_under_five_male}} </p>
            </td>
            <td width="234">
                <p> {{$grand_total_under_five_female}}</p>
            </td>
            <td>{{$grand_total_under_five_male + $grand_total_under_five_female}}</td>
        </tr>
        <tr>
            <td width="234">
                <p>6-18</p>
            </td>
            <td width="234">
                <p> {{$grand_tota_six_eighteen_male}} </p>
            </td>
            <td width="234">
                <p> {{$grand_tota_six_eighteen_female}}</p>
            </td>
            <td> {{$grand_tota_six_eighteen_male + $grand_tota_six_eighteen_female}} </td>
        </tr>
        <tr>
            <td width="234">
                <p>19-50</p>
            </td>
            <td width="234">
                <p> {{$grand_tota_nineteen_fifty_male}} </p>
            </td>
            <td width="234">
                <p> {{$grand_tota_nineteen_fifty_female}}</p>
            </td>
            <td> {{$grand_tota_nineteen_fifty_male + $grand_tota_nineteen_fifty_female}} </td>
        </tr>
        <tr>
            <td width="234">
                <p>&gt;50</p>
            </td>
            <td width="234">
                <p> {{$grand_tota_over_fifty_male}} </p>
            </td>
            <td width="234">
                <p> {{$grand_tota_over_fifty_female}}</p>
            </td>
            <td> {{$grand_tota_over_fifty_male + $grand_tota_over_fifty_female}} </td>
        </tr>
        <tr>

            <td>
                <b>Total</b>
            </td>
            <td width="234">
                <p> {{$all_total_male}} </p>
            </td>
            <td width="234">
                <p> {{$all_total_female}}</p>
            </td>
            <td> <b>{{$all_total}} </b></td>

        </tr>
    </tbody>
</table>