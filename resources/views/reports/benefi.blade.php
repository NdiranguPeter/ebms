<style>
    .lh>td {
        line-height: 0.5px;
    }
</style>
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
        $overall_total_male = 0;
        $overall_total_female = 0;
        $total_zero_two_male = 0;
        $total_zero_two_female = 0;
        $total_three_five_male = 0;
        $total_three_five_female = 0;
        $total_six_twelve_male = 0;
        $total_six_twelve_female = 0;
        $total_thirteen_seventeen_male = 0;
        $total_thirteen_seventeen_female = 0;
        $total_eigteen_twentyfive_male = 0;
        $total_eigteen_twentyfive_female = 0;
        $total_twentysix_fourtynine_male = 0;
        $total_twentysix_fourtynine_female = 0;
        $total_fifty_fiftynine_male = 0;
        $total_fifty_fiftynine_female = 0;
        $total_sixty_sixtynine_male = 0;
        $total_sixty_sixtynine_female = 0;
        $total_seventy_seventynine_male = 0;
        $total_seventy_seventynine_female = 0;
        $total_above_eighty_male = 0;
        $total_above_eighty_female = 0;
        @endphp
        @foreach ($activities as $activity)

        @php
        $total_male = $activity->zero_two_male + $activity->three_five_male + $activity->six_twelve_male +
        $activity->thirteen_seventeen_male
        + $activity->eigteen_twentyfive_male + $activity->twentysix_fourtynine_male + $activity->fifty_fiftynine_male +
        $activity->sixty_sixtynine_male
        + $activity->seventy_seventynine_male + $activity->above_eighty_male;


        $total_female = $activity->zero_two_female + $activity->three_five_female + $activity->six_twelve_female +
        $activity->thirteen_seventeen_female
        + $activity->eigteen_twentyfive_female + $activity->twentysix_fourtynine_female +
        $activity->fifty_fiftynine_female +
        $activity->sixty_sixtynine_female
        + $activity->seventy_seventynine_female + $activity->above_eighty_female;

        $total_male_female = $total_male + $total_female;

        $overall_total_male = $overall_total_male + $total_male;
        $overall_total_female = $overall_total_female + $total_female;

        $total_zero_two_male = $total_zero_two_male + $activity->zero_two_male;
        $total_zero_two_female = $total_zero_two_female + $activity->zero_two_female;

        $total_three_five_male = $total_three_five_male + $activity->three_five_male;
        $total_three_five_female = $total_three_five_female + $activity->three_five_female;

        $total_six_twelve_male = $total_six_twelve_male + $activity->six_twelve_male;
        $total_six_twelve_female = $total_six_twelve_female + $activity->six_twelve_female;

        $total_thirteen_seventeen_male = $total_thirteen_seventeen_male + $activity->thirteen_seventeen_male;
        $total_thirteen_seventeen_female = $total_thirteen_seventeen_female + $activity->thirteen_seventeen_female;

        $total_eigteen_twentyfive_male = $total_eigteen_twentyfive_male + $activity->eigteen_twentyfive_male;
        $total_eigteen_twentyfive_female = $total_eigteen_twentyfive_female + $activity->eigteen_twentyfive_female;

        $total_twentysix_fourtynine_male = $total_twentysix_fourtynine_male + $activity->twentysix_fourtynine_male;
        $total_twentysix_fourtynine_female = $total_twentysix_fourtynine_female +
        $activity->twentysix_fourtynine_female;

        $total_fifty_fiftynine_male = $total_fifty_fiftynine_male + $activity->fifty_fiftynine_male;
        $total_fifty_fiftynine_female = $total_fifty_fiftynine_female + $activity->fifty_fiftynine_female;

        $total_sixty_sixtynine_male = $total_sixty_sixtynine_male + $activity->sixty_sixtynine_male;
        $total_sixty_sixtynine_female = $total_sixty_sixtynine_female + $activity->sixty_sixtynine_female;

        $total_seventy_seventynine_male = $total_seventy_seventynine_male + $activity->seventy_seventynine_male;
        $total_seventy_seventynine_female = $total_seventy_seventynine_female + $activity->seventy_seventynine_female;


        $total_above_eighty_male = $total_above_eighty_male + $activity->above_eighty_male;
        $total_above_eighty_female = $total_above_eighty_female + $activity->above_eighty_female;
        @endphp

        <tr>
            <td rowspan="11" width="234">
                <p> {{$activity->name}} </p>
            </td>

            <td width="234" style="line-height: 0.5px;">
                <p>0 - 2</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->zero_two_male}}</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->zero_two_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">{{$activity->zero_two_male + $activity->zero_two_female }}
            </td>
        </tr>
        <tr class="lh">
            <td width="234" style="line-height: 0.5px;">
                <p>3-5</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->three_five_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->three_five_female}}</p>
            </td>
            <td style="color: #066fa3;"> {{$activity->three_five_male + $activity->three_five_female }} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>6 - 12</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p>{{$activity->six_twelve_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->six_twelve_female}} </p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$activity->six_twelve_male + $activity->six_twelve_female }} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>13 - 17 </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->thirteen_seventeen_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->thirteen_seventeen_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$activity->thirteen_seventeen_male + $activity->thirteen_seventeen_female }}
            </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>18 - 25</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->eigteen_twentyfive_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->eigteen_twentyfive_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$activity->eigteen_twentyfive_male + $activity->eigteen_twentyfive_female }}
            </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>26 - 49 </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->twentysix_fourtynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->twentysix_fourtynine_female}}</p>
            </td>
            <td style="color: #066fa3;">
                {{$activity->twentysix_fourtynine_male + $activity->twentysix_fourtynine_female }} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>50 - 59</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->fifty_fiftynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->fifty_fiftynine_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$activity->fifty_fiftynine_male + $activity->fifty_fiftynine_female }} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>60 - 69</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->sixty_sixtynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->sixty_sixtynine_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$activity->sixty_sixtynine_male + $activity->sixty_sixtynine_female }} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>70 - 80</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->seventy_seventynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->seventy_seventynine_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$activity->seventy_seventynine_male + $activity->seventy_seventynine_female }}
            </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>above 80</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->above_eighty_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$activity->above_eighty_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$activity->above_eighty_male + $activity->above_eighty_female }} </td>
        </tr>

        <tr style="color: #066fa3;">

            <td>
                <b>Total</b>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_female}}</p>
            </td>
            <td> <b>{{$total_male_female}} </b></td>

        </tr>

        @endforeach
        <tr style="background: #349ba7 !important;color: #fff;">
            <td width="634">
                <p>Activity</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p>Age group</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p>male</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p>female</p>
            </td>
            <td width="234" style="line-height: 0.5px;">Total</td>
        </tr>
        <tr>
            <td rowspan="11" width="234" style="line-height: 0.5px;">
                <p> All activities </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p>0 - 2</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_zero_two_male}}</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_zero_two_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">{{$total_zero_two_male + $total_zero_two_female}}</td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>3-5</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_three_five_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_three_five_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;"> {{$total_three_five_male + $total_three_five_female}} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>6 - 12</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p>{{$total_six_twelve_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_six_twelve_female}} </p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;"> {{$total_six_twelve_male + $total_six_twelve_female}} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>13 - 17 </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_thirteen_seventeen_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_thirteen_seventeen_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$total_thirteen_seventeen_male+$total_thirteen_seventeen_female}}
            </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>18 - 25</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_eigteen_twentyfive_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_eigteen_twentyfive_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$total_eigteen_twentyfive_male + $total_eigteen_twentyfive_female}}
            </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>26 - 49 </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_twentysix_fourtynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_twentysix_fourtynine_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$total_twentysix_fourtynine_male + $total_twentysix_fourtynine_female}} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>50 - 59</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_fifty_fiftynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_fifty_fiftynine_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$total_fifty_fiftynine_male + $total_fifty_fiftynine_female}} </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>60 - 69</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_sixty_sixtynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_sixty_sixtynine_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$total_sixty_sixtynine_male + $total_sixty_sixtynine_female}}
            </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>70 - 80</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_seventy_seventynine_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_seventy_seventynine_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">
                {{$total_seventy_seventynine_male + $total_seventy_seventynine_female}}
            </td>
        </tr>
        <tr>
            <td width="234" style="line-height: 0.5px;">
                <p>above 80</p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_above_eighty_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$total_above_eighty_female}}</p>
            </td>
            <td style="color: #066fa3; line-height: 0.5px;">{{$total_above_eighty_male + $total_above_eighty_female}}
            </td>
        </tr>

        <tr style="background: #349ba7 !important;color: #fff;">

            <td>
                <b>Total</b>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$overall_total_male}} </p>
            </td>
            <td width="234" style="line-height: 0.5px;">
                <p> {{$overall_total_female}}</p>
            </td>
            <td>
                {{$overall_total_male + $overall_total_female}}
            </td>

        </tr>

    </tbody>
</table>