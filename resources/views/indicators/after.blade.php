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

            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Update indicator {{$before_after}} project implementation
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">

                    {!! Form::open(['action'=>'IndicatorsafterController@store', 'method'=>'POST']) !!}
                    <input name="id" type="hidden" value="{{$indicator->id}}">
                    <input name="the_year" type="hidden" value=1>
                    <input name="output_id" type="hidden" value="{{$indicator->output_id}}">
                    <input name="goal_id" type="hidden" value="{{$indicator->goal_id}}">
                    <input name="outcome_id" type="hidden" value="{{$indicator->outcome_id}}">
                    <input name="project_id" type="hidden" value="{{$indicator->project_id}}">
                    <input name="duration" type="hidden" value={{$indicator->duration}}>
                    <div class="col-sm-12" style="color:green; font-weight:bold;">
                        <p>{!!$indicator->name!!}</p>
                    </div>
                    <div class="col-sm-6">


                        <?php 
                        $period = $indicator->duration;
                        if ($period<=365) {
                            $datetime1 = new DateTime($indicator->start);
                            $datetime2 = new DateTime($indicator->end);
                            $interval = $datetime1->diff($datetime2);
                            $years = $interval->format('%y');
                            $months = $interval->format('%m');
                            $days = $interval->format('%d');
                        } else {
                            $datetime1 = new DateTime($indicator->start);
                            $datetime2 = new DateTime($indicator->end);
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
                        {{-- <p>Duration: {{$interval->format('%y years %m months %d days')}}</p> --}}
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
                            <input name="start" type="hidden" value={{$indicator->start}}>
                            <input name="end" type="hidden" value={{$indicator->end}}>
                            <input name="years" type="hidden" value={{$years}}>
                            <input name="months" type="hidden" value={{$months}}>
                            <input name="before_after" type="hidden" value={{$before_after}}>
                            <input name="ovi_date_default" type="hidden" value={{\Carbon\Carbon::now()}}>
                            @if ($before_after == 'after')
                            <input name="baseline_target" type="hidden" value={{$indicator->baseline_target}}>
                            <input name="project_target" type="hidden" value={{$indicator->project_target}}>
                            <input name="ovi_date" type="hidden" value={{\Carbon\Carbon::now()}}>

                            @endif

                        </div>
                        <div class="form-group">
                            {{Form::label('person_responsible', 'Person responsible')}}
                            {{Form::text('person_responsible',$indicator->person_responsible , ['class' =>
                            'form-control', 'placeholder' => 'person responsible'])}}
                        </div>

                        @if ($before_after == 'before')

                        <div class="form-group">
                            {{Form::label('baseline_target', 'Baseline')}}
                            {{Form::text('baseline_target',$indicator->baseline_target , ['class' =>
                                                    'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('project_target', 'Project target')}}
                            {{Form::text('project_target',$indicator->project_target , ['class' =>
                                                    'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('ovi_date', 'Expected date of achieving Indicator')}}
                            {{Form::date('ovi_date', \Carbon\Carbon::now(), ['class' =>'form-control', 'placeholder' => ''])}}
                        </div>

                        @endif
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('activities_distribution', 'indicator/Time distribution')}}
                            <table class="table table-bordered">
                                <thead>
                                    <th>Period</th>
                                    <th>Achieved</th>
                                </thead>
                                <tbody>
                                    @if (($months <1 && $days>0) || $months>0 || $years >=1 ) <tr>
                                            <td>January</td>
                                            <td><input name="jan" type="number" value={{$indicator->jan}}></td>
                                        </tr>
                                        @endif

                                        @if (($months==1 && $days>0) || $months >1 || $years >=1) <tr>
                                            <td>February</td>
                                            <td><input name="feb" type="number" value={{$indicator->feb}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==2 && $days>0) || $months >2|| $years >=1) <tr>
                                            <td>March</td>
                                            <td><input name="mar" type="number" value={{$indicator->mar}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==3 && $days>0) || $months >3 || $years >=1 ) <tr>
                                            <td>April</td>
                                            <td><input name="apr" type="number" value={{$indicator->apr}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==4 && $days>0) || $months >4 || $years >=1) <tr>
                                            <td>May</td>
                                            <td><input name="may" type="number" value={{$indicator->may}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==5 && $days>0) || $months >5 || $years >=1) <tr>
                                            <td>June</td>
                                            <td><input name="jun" type="number" value={{$indicator->jun}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==6 && $days>0) || $months >6 || $years >=1) <tr>
                                            <td>July</td>
                                            <td><input name="jul" type="number" value={{$indicator->jul}}></td>
                                        </tr>
                                        @endif
                                        @if (($months==7 && $days>0) || $months >7|| $years >=1) <tr>
                                            <td>August</td>
                                            <td><input name="aug" type="number" value={{$indicator->aug}}>
                                            </td>
                                        </tr>
                                        @endif
                                        @if (($months==8 && $days>0) || $months >8 || $years >=1) <tr>
                                            <td>September</td>
                                            <td><input name="sep" type="number" value={{$indicator->sep}}>
                                            </td>
                                        </tr>
                                        @endif
                                        @if (($months==9 && $days>0) || $months >9 || $years >=1) <tr>
                                            <td>October</td>
                                            <td><input name="oct" type="number" value={{$indicator->oct}}>
                                            </td>
                                        </tr>
                                        @endif
                                        @if (($months==10 && $days>0) || $months >10 || $years >=1)
                                        <tr>
                                            <td>November</td>
                                            <td><input name="nov" type="number" value={{$indicator->nov}}></td>
                                        </tr>
                                        @endif
                                        @if ($months==11 && $days>0 || $years >=1)
                                        <tr>
                                            <td>December</td>
                                            <td><input name="dec" type="number" value={{$indicator->dec}}>
                                            </td>
                                        </tr>
                                        @endif
                                </tbody>
                            </table>
                        </div>


                        <a href="/indicators/{{$indicator->project_id}}" class="btn btn-default" style="float:left;"><i
                                class="ace-icon fa fa-arrow-circle-o-left"></i>Back to indicators </a>
                        <div style="float:right;">
                            {{Form::submit('update indicator', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection