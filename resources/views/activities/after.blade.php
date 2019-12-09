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
                    {!! Form::open(['action'=>'ActivitiesAfterController@store', 'method'=>'POST']) !!}
                    <input name="id" type="hidden" value="{{$activity->id}}">
                    <input name="the_year" type="hidden" value=1>
                    <input name="output_id" type="hidden" value="{{$activity->output_id}}">

                    <input name="budget_start" type="hidden" value={{$activity->budget}}>
                    <input name="duration" type="hidden" value={{$activity->duration}}>
                    <input name="person_responsible" type="hidden" value={{$activity->person_responsible}}>

                    <input name="total_beneficiaries" type="hidden" value={{$activity->total_beneficiaries}}>
                    <div class="col-sm-12">
                        <p style="color: green; font-weight:bold;">{!!$activity->name!!}</p>

                    </div>
                    <br />
                    <br />

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

                        {{-- <p style="color: green;">Duration: {{$interval->format('%y years %m months %d days')}}</p>
                        --}}
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
                            {{Form::text('budget_end', $activity->budget, ['readonly'=>'true','class' => 'form-control', 'placeholder' => 'budget'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('activities_distribution', 'Activity/Time distribution')}}
                            <table class="table table-bordered">
                                <thead>
                                    <th>Period</th>
                                    <th>Planned</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>January</td>
                                        <td><input name="jan" type="number" value={{$activity->jan}}></td>
                                    </tr>
                                    <tr>
                                        <td>February</td>
                                        <td><input name="feb" type="number" value={{$activity->feb}}></td>
                                    </tr>
                                    <tr>
                                        <td>March</td>
                                        <td><input name="mar" type="number" value={{$activity->mar}}></td>
                                    </tr>
                                    <tr>
                                        <td>April</td>
                                        <td><input name="apr" type="number" value={{$activity->apr}}></td>
                                    </tr>
                                    <tr>
                                        <td>May</td>
                                        <td><input name="may" type="number" value={{$activity->may}}></td>
                                    </tr>
                                    <tr>
                                        <td>June</td>
                                        <td><input name="jun" type="number" value={{$activity->jun}}></td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td><input name="jul" type="number" value={{$activity->jul}}></td>
                                    </tr>
                                    <tr>
                                        <td>August</td>
                                        <td><input name="aug" type="number" value={{$activity->aug}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>September</td>
                                        <td><input name="sep" type="number" value={{$activity->sep}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>October</td>
                                        <td><input name="oct" type="number" value={{$activity->oct}}>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>November</td>
                                        <td><input name="nov" type="number" value={{$activity->nov}}></td>
                                    </tr>

                                    <tr>
                                        <td>December</td>
                                        <td><input name="dec" type="number" value={{$activity->dec}}>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>


                    </div>

                    <div class="col-sm-6"><br>


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
                                {{Form::number('disabled_male', 0, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>

                            <div class="col-sm-6">
                                {{Form::label('disabled_female', 'Female')}}
                                {{Form::number('disabled_female', 0, ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>

                        </div>
                        <div style="min-height:10px;">
                            <p>&nbsp</p>
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

                <input type="hidden" name="activity_id" value={{$activity->id}}>
                <input type="hidden" name="project_id" value={{$project->id}}>
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