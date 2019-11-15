@extends('layouts.default')
@section('content')
<div class="container-fluid main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="list-inline">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="/home">Home</a>
                </li>
                /
                <li>
                    <i class="ace-icon fa fa-cog"></i>
                    <a href="/meal">MEAL</a>
                </li>
                /
                <li class="active">{!!$output->name!!}</li>
                /
                <li class="active">{!!$activity->name!!} </li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                            autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Update activity {{$before_after}} project implementation
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @isset($error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endisset

                <div class="well col-sm-12">
                    {!! Form::open(['action'=>'ActivitiesAfterController@store', 'method'=>'POST']) !!}
                    <input name="id" type="hidden" value="{{$activity->id}}">
                    <input name="the_year" type="hidden" value=1>
                    <input name="output_id" type="hidden" value="{{$activity->output_id}}">

                    <input name="budget_start" type="hidden" value={{$activity->budget}}>
                    <input name="duration" type="hidden" value={{$activity->duration}}>
                    <input name="person_responsible" type="hidden" value={{$activity->person_responsible}}>

                    <input name="total_beneficiaries" type="hidden" value={{$activity->total_beneficiaries}}>

                    <div class="col-sm-6">


                        <?php 
                        $period = $activity->duration;
                        if ($period<=365) {
                            $datetime1 = new DateTime($activity->start);
                            $datetime2 = new DateTime($activity->end);
                            $interval = $datetime1->diff($datetime2);
                            $years = $interval->format('%y');
                            $months = $interval->format('%m');
                            $days = $interval->format('%d');
                        } else {
                            $datetime1 = new DateTime($activity->start);
                            $datetime2 = new DateTime($activity->end);
                            $interval = $datetime1->diff($datetime2);
                            $years = $interval->format('%y');
                            $months = $interval->format('%m');
                            $days = $interval->format('%d');
                            $counter = 1;
                        }
                        
                        if ($years>0 && $months >0) {
                           $years ++;
                        }

                        
                        
                        ?>
                        <p>Duration: {{$interval->format('%y years %m months %d days')}}</p>
                        @if ($years >1)
                        <div class="form-group">
                            {{Form::label('the_year', 'Select year')}}
                            <select name="the_year" id="the_year"
                                class="form-control @error('the year') is-invalid @enderror">
                                @for ($i = 1; $i <= $years; $i++) <option value={{$i}}>{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <input name="start" type="hidden" value={{$activity->start}}>
                            <input name="end" type="hidden" value={{$activity->end}}>
                            <input name="years" type="hidden" value={{$years}}>
                            <input name="months" type="hidden" value={{$months}}>
                            <input name="before_after" type="hidden" value={{$before_after}}>

                            {{Form::label('budget', 'Budget(USD)')}}
                            {{Form::text('budget_end', $activity->budget, ['class' => 'form-control', 'placeholder' => 'budget'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('activities_distribution', 'Activity/Time distribution')}}
                            <table class="table table-bordered">
                                <thead>
                                    <th>Period</th>
                                    <th>Achieved</th>
                                </thead>
                                <tbody>
                                    @if (($months <1 && $days>0) || $months>0 || $years >=1 ) <tr>
                                            <td>January</td>
                                            <td><input name="jan" type="number" value={{$activity->jan}}></td>
                                        </tr>
                                        @endif

                                        @if (($months==1 && $days>0) || $months >1 || $years >=1) <tr>
                                            <td>February</td>
                                            <td><input name="feb" type="number" value={{$activity->feb}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==2 && $days>0) || $months >2|| $years >=1) <tr>
                                            <td>March</td>
                                            <td><input name="mar" type="number" value={{$activity->mar}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==3 && $days>0) || $months >3 || $years >=1 ) <tr>
                                            <td>April</td>
                                            <td><input name="apr" type="number" value={{$activity->apr}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==4 && $days>0) || $months >4 || $years >=1) <tr>
                                            <td>May</td>
                                            <td><input name="may" type="number" value={{$activity->may}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==5 && $days>0) || $months >5 || $years >=1) <tr>
                                            <td>June</td>
                                            <td><input name="jun" type="number" value={{$activity->jun}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==6 && $days>0) || $months >6 || $years >=1) <tr>
                                            <td>July</td>
                                            <td><input name="jul" type="number" value={{$activity->jul}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==7 && $days>0) || $months >7|| $years >=1) <tr>
                                            <td>August</td>
                                            <td><input name="aug" type="number" value={{$activity->aug}}>
                                            </td>
                                        </tr>
                                        @endif
                                        @if (($months==8 && $days>0) || $months >8 || $years >=1) <tr>
                                            <td>September</td>
                                            <td><input name="sep" type="number" value={{$activity->sep}}>
                                            </td>
                                        </tr>
                                        @endif
                                        @if (($months==9 && $days>0) || $months >9 || $years >=1) <tr>
                                            <td>October</td>
                                            <td><input name="oct" type="number" value={{$activity->oct}}>
                                            </td>
                                        </tr>
                                        @endif
                                        @if (($months==10 && $days>0) || $months >10 || $years >=1)
                                        <tr>
                                            <td>November</td>
                                            <td><input name="nov" type="number" value={{$activity->nov}}></td>
                                        </tr>
                                        @endif
                                        @if ($months==11 && $days>0 || $years >=1)
                                        <tr>
                                            <td>December</td>
                                            <td><input name="dec" type="number" value={{$activity->dec}}>
                                            </td>
                                        </tr>
                                        @endif
                                </tbody>
                            </table>
                        </div>
                        <h5>Indirect beneficiaries</h5>
                        <div class="form-group">
                            <div class="col-sm-6">
                                {{Form::label('indirect_male', 'Male')}}
                                {{Form::number('indirect_male', $activity->indirect_male, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>
                            <div class="col-sm-6">
                                {{Form::label('indirect_female', 'Female')}}
                                {{Form::number('indirect_female', $activity->indirect_female, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>People leaving with disability</h5>

                            <div class="col-sm-6">
                                {{Form::label('disabled_male', 'Male')}}
                                {{Form::number('disabled_male', 0, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>
                            <div class="col-sm-6">
                                {{Form::label('disabled_female', 'Female')}}
                                {{Form::number('disabled_female', 0, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            {{Form::label('gender_age_distribution', 'Geneder/Age distribution')}}
                            <table class="table table-bordered">
                                <th>Age group</th>
                                <th>Male</th>
                                <th>Female</th>
                                <tbody>
                                    <tr>
                                        <td>0 - 2</td>
                                        <td><input name="zero_two_male" type="number"
                                                value={{$activity->zero_two_male}}>
                                        </td>
                                        <td><input name="zero_two_female" type="number"
                                                value={{$activity->zero_two_female}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3 - 5</td>
                                        <td><input name="three_five_male" type="number"
                                                value={{$activity->three_five_male}}>
                                        </td>
                                        <td><input name="three_five_female" type="number"
                                                value={{$activity->three_five_female}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6 - 12</td>
                                        <td>
                                            <input name="six_twelve_male" type="number"
                                                value={{$activity->six_twelve_male}}>
                                        </td>
                                        <td>
                                            <input name="six_twelve_female" type="number"
                                                value={{$activity->six_twelve_female}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13 - 17</td>
                                        <td><input name="thirteen_seventeen_male" type="number"
                                                value={{$activity->thirteen_seventeen_male}}></td>
                                        <td><input name="thirteen_seventeen_female" type="number"
                                                value={{$activity->thirteen_seventeen_female}}></td>
                                    </tr>
                                    <tr>
                                        <td>18 - 25</td>
                                        <td><input name="eigteen_twentyfive_male" type="number"
                                                value={{$activity->eigteen_twentyfive_male}}></td>
                                        <td><input name="eigteen_twentyfive_female" type="number"
                                                value={{$activity->eigteen_twentyfive_female}}></td>

                                    </tr>
                                    <tr>
                                        <td>26 - 49</td>
                                        <td><input name="twentysix_fourtynine_male" type="number"
                                                value={{$activity->twentysix_fourtynine_male}}></td>
                                        <td><input name="twentysix_fourtynine_female" type="number"
                                                value={{$activity->twentysix_fourtynine_female}}></td>

                                    </tr>
                                    <tr>
                                        <td>50 - 59</td>
                                        <td><input name="fifty_fiftynine_male" type="number"
                                                value={{$activity->fifty_fiftynine_male}}>
                                        </td>
                                        <td><input name="fifty_fiftynine_female" type="number"
                                                value={{$activity->fifty_fiftynine_female}}>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>60 - 69</td>
                                        <td><input name="sixty_sixtynine_male" type="number"
                                                value={{$activity->sixty_sixtynine_male}}>
                                        </td>
                                        <td><input name="sixty_sixtynine_female" type="number"
                                                value={{$activity->sixty_sixtynine_female}}>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>70 - 79</td>
                                        <td><input name="seventy_seventynine_male" type="number"
                                                value={{$activity->seventy_seventynine_male}}></td>
                                        <td><input name="seventy_seventynine_female" type="number"
                                                value={{$activity->seventy_seventynine_female}}></td>

                                    </tr>
                                    <tr>
                                        <td>Above 80</td>
                                        <td><input name="above_eighty_male" type="number"
                                                value={{$activity->above_eighty_male}}>
                                        </td>
                                        <td><input name="above_eighty_female" type="number"
                                                value={{$activity->above_eighty_female}}>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <a href="/activities/output/{{$output->id}}" class="btn btn-default" style="float:left;"><i
                                class="ace-icon fa fa-arrow-circle-o-left"></i>Back to activities</a>
                        <div style="float:right;">
                            {{Form::submit('update activity', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection