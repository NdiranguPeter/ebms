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
                {{-- <li class="active">{!!$output->name!!}</li> --}}

            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Update activity {{$before_after}} project implementation
                </h1>
                @if ($before_after == "after")
                <a class="btn btn-success" style="float:right; margin-top: -2%;" data-toggle="modal"
                    data-target="#exampleModal"><i class="ace-icon fa fa-plus"></i> Add
                    Challenges, Solutions and General Observations</a>
                @endif

            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <p>{!!$act->name!!}</p>

                    {!! Form::open(['action'=>'ActivitiesController@before2']) !!}
                    <div class="form-group col-sm-6">
                        <input name="before_after" type="hidden" value={{$before_after}}>
                        <input type="hidden" name="activityID" value={{$act->id}}>
                        {{Form::label('year', 'Select year')}}
                        <select name="year" id="year" class="form-control @error('year') is-invalid @enderror"
                            onchange="this.form.submit()">
                            <option value="">Select year</option>
                            @php
                            $datetime3 = new DateTime($act->start);
                            $datetime1 = new DateTime($activity->start);
                            $datetime2 = new DateTime($activity->end);
                            $interval = $datetime1->diff($datetime2);
                            $years = $interval->format('%y');
                            $months = $interval->format('%m');
                            $days = $interval->format('%d');
                            $startyear = $datetime1->format('Y');
                            $startyr = $datetime3->format('Y');
                            $startmonth = $datetime1->format('m');
                            $endyear = $datetime2->format('Y');
                            $endmonth = $datetime2->format('m');
                            @endphp

                            @for ($i =$startyr; $i <= $endyear; $i++) <option value={{$i}} @if ($yr==$i) selected
                                @endif>{{$i}}</option>
                                @endfor
                        </select>

                    </div>
                    <div class="form-group col-sm-6">
                        {{Form::label('month', 'Select month')}}
                        <select name="month" id="month" class="form-control @error('year') is-invalid @enderror"
                            onchange="this.form.submit()">
                            <option value="">Select month</option>
                            @if ($startyear != $endyear)
                            @if($startmonth <= 1) <option value="1" @if ($month==1) selected @endif>January</option>
                                @endif
                                @if($startmonth <= 2) <option value="2" @if ($month==2) selected @endif>February
                                    </option>
                                    @endif
                                    @if($startmonth <= 3) <option value="3" @if ($month==3) selected @endif>March
                                        </option>
                                        @endif
                                        @if($startmonth <= 4) <option value="4" @if ($month==4) selected @endif>April
                                            </option>
                                            @endif
                                            @if($startmonth <= 5) <option value="5" @if ($month==5) selected @endif>May
                                                </option>
                                                @endif
                                                @if($startmonth <= 6) <option value="6" @if ($month==6) selected @endif>
                                                    June</option>
                                                    @endif
                                                    @if($startmonth <= 7) <option value="7" @if ($month==7) selected
                                                        @endif>July</option>
                                                        @endif
                                                        @if($startmonth <= 8) <option value="8" @if ($month==8) selected
                                                            @endif>August</option>
                                                            @endif
                                                            @if($startmonth <= 9) <option value="9" @if ($month==9)
                                                                selected @endif>September</option>
                                                                @endif
                                                                @if($startmonth <= 10) <option @if ($month==10) selected
                                                                    @endif value="10">
                                                                    October</option>
                                                                    @endif
                                                                    @if($startmonth <= 11) <option @if ($month==11)
                                                                        selected @endif value="11">November
                                                                        </option>
                                                                        @endif
                                                                        @if($startmonth <= 12) <option @if ($month==12)
                                                                            selected @endif value="12">
                                                                            December</option>
                                                                            @endif
                                                                            @endif

                                                                            @if ($startyear == $endyear)

                                                                            @if($startmonth <= 1 AND $endmonth >= 1) <option @if ($month==1)
                                                                                selected @endif value="1">
                                                                                January</option>
                                                                            @endif
                                                                            @if($startmonth <= 2 AND $endmonth >=2) <option @if ($month==2)
                                                                                selected @endif value="2">
                                                                                February</option>
                                                                            @endif
                                                                            @if($startmonth <= 3 AND $endmonth >=3) <option @if ($month==3)
                                                                                selected @endif value="3">March
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 4 AND $endmonth >=4) <option @if ($month==4)
                                                                                selected @endif value="4">April
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 5 AND $endmonth >=5) <option @if ($month==5)
                                                                                selected @endif value="5">May
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 6 AND $endmonth >=6) <option @if ($month==6)
                                                                                selected @endif value="6">June
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 7 AND $endmonth >=7) <option @if ($month==7)
                                                                                selected @endif value="7">July
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 8 AND $endmonth >=8) <option @if ($month==8)
                                                                                selected @endif value="8">August
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 9 AND $endmonth >=9) <option @if ($month==9)
                                                                                selected @endif value="9">
                                                                                September</option>
                                                                            @endif
                                                                            @if($startmonth <= 10 AND $endmonth >=10) <option @if ($month==10)
                                                                                selected @endif value="10">
                                                                                October
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 11 AND $endmonth >=11) <option @if ($month==11)
                                                                                selected @endif value="11">
                                                                                November
                                                                            </option>
                                                                            @endif
                                                                            @if($startmonth <= 12 AND $endmonth >=12) <option @if ($month==12)
                                                                                selected @endif value="12">
                                                                                December</option>
                                                                            @endif
                                                                            @endif

                        </select>
                    </div>

                    {!! Form::close() !!}

                </div>

                <div class="well col-sm-12">
                    {!! Form::open(['action'=>'ActivitiesAfterController@store', 'method'=>'POST']) !!}
                    <input name="id" type="hidden" value="{{$activity->activity_id}}">
                    <input name="the_year" type="hidden" value=1>
                    <input name="year" type="hidden" value={{$yr}}>
                    <input name="month" type="hidden" value={{$month}}>
                    <input name="before_after" type="hidden" value={{$activity->before_after}}>

                    <div class="col-sm-12">
                        <p style="color: green; font-weight:bold;">{!!$activity->name!!}</p>
                    </div>

                    <div class="col-sm-6">

                        <div class="form-group" style="margin-top:10px;">
                            <h5>Direct beneficiaries</h5>
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
                    </div>
                    <div class="col-sm-6">
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
                        <div style="min-height:10px;">
                            <p>&nbsp</p>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">

                            <h5>People living with disability</h5>

                            <div class="col-sm-6">
                                {{Form::label('disabled_male', 'Male')}}
                                {{Form::number('disabled_male', $activity->disabled_male, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>

                            <div class="col-sm-6">
                                {{Form::label('disabled_female', 'Female')}}
                                {{Form::number('disabled_female', $activity->disabled_female, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>

                        </div>
                        <div style="min-height:10px;">
                            <p>&nbsp</p>
                        </div>

                    </div>



                    <a href="/activities/{{$project->id}}" class="btn btn-default" style="float:left;"><i
                            class="ace-icon fa fa-arrow-circle-o-left"></i>Back to activities</a>
                    <div style="float:right;">
                        {{Form::submit('update activity', ['class'=>'btn btn-primary'])}}
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record any challenge faced during implementation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($before_after == "after")
                @if (count($challenges)>0)

                <table class="table table-bordered">
                    <thead>
                        <th>Challenge</th>
                        <th>Solution Implemented</th>
                    </thead>
                    <tbody>
                        @foreach ($challenges as $challenge)
                        <tr>
                            <td>{{$challenge->challenge}}</td>
                            <td>{{$challenge->solution}}</td>
                            <td>
                                {!! Form::open(['action'=>['ChallengesController@destroy',$challenge->id],
                                'method'=>'POST']) !!}

                                {{Form::button('<i class="red ace-icon fa fa-trash-o">Delete</i>', ['type'=>'submit', 'onClick'=>'return confirm("Are you sure you want to delete?")'])}}

                                {{Form::hidden('_method','DELETE')}}
                                {!!Form::close()!!}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @endif
                <hr>

                {!! Form::open(['action'=>'ChallengesController@store', 'method'=>'POST']) !!}

                <input type="hidden" name="activity_id" value={{$act->id}}>
                {{-- <input type="hidden" name="project_id" value={{$project->id}}> --}}
                {{Form::label('challenge', 'State the Challenge', ['style'=>'color: #2da0ef;'])}}
                {{Form::textarea('challenge','', ['class' => 'form-control'])}}
                <hr>
                {{Form::label('solution', 'Solution Implemented', ['style'=>'color: #2da0ef;'])}}
                {{Form::textarea('solution','', ['class' => 'form-control'])}}
                <hr>
                {{Form::label('observation', 'General Observation and Recommendation', ['style'=>'color: #2da0ef;'])}}
                {{Form::textarea('observation','', ['class' => 'form-control'])}}

            </div>

            <div class="modal-footer">
                {{Form::submit('Save', ['class'=>'btn btn-primary right'])}}

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // show the alert
    setTimeout(function() {
    $(".alert").alert('close');
    }, 3600);
    });

    
</script>

@endsection