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
                    Update indicator {{$before_after}} project implementation  </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <p>{!!$ind->name!!}</p>



                    {!! Form::open(['action'=>'IndicatorsController@before2']) !!}
                    <div class="form-group col-sm-6">
                        <input name="before_after" type="hidden" value={{$before_after}}>
                        <input type="hidden" name="indicatorID" value={{$ind->id}}>
                        {{Form::label('year', 'Select year')}}
                        <select name="year" id="year" class="form-control @error('year') is-invalid @enderror"
                            onchange="this.form.submit()">
                            @php
                            $datetime3 = new DateTime($ind->start);
                            $datetime1 = new DateTime($indicator->start);
                            $datetime2 = new DateTime($indicator->end);
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

                            @if($startmonth <= 1) <option value="1" @if ($month==1) selected @endif>
                                January
                                </option>

                                @endif
                                @if($startmonth <= 2) <option value="2" @if ($month==2) selected @endif>
                                    February
                                    </option>
                                    @endif
                                    @if($startmonth <= 3) <option value="3" @if ($month==3) selected @endif>
                                        March
                                        </option>
                                        @endif
                                        @if($startmonth <= 4) <option value="4" @if ($month==4) selected @endif>April
                                            </option>
                                            @endif
                                            @if($startmonth <= 5) 
                                            <option value="5" @if ($month==5) selected @endif>May
                                                </option>
                                                @endif
                                                @if($startmonth <= 6) <option value="6" @if ($month==6) selected @endif>
                                                    June</option>
                                                    @endif
                                                    @if($startmonth <= 7) <option value="7" @if ($month==7) selected
                                                        @endif>July</option>
                                                        @endif
                                                        @if($startmonth <= 8) <option value="8" @if ($month==8) selected
                                                            @endif>August
                                                            </option>
                                                            @endif
                                                            @if($startmonth <= 9) <option value="9" @if ($month==9)
                                                                selected @endif>
                                                                September</option>
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

                                                                            @if($startmonth <= 1 AND $endmonth>= 1)
                                                                                <option @if ($month==1) selected @endif
                                                                                    value="1">
                                                                                    January</option>
                                                                                @endif
                                                                                @if( $startmonth <= 2 AND $endmonth>= 2)
                                                                                    <option @if ($month==2) selected @endif value="2">
                                                                                        February
                                                                                    </option>
                                                                                    @endif

                                                                                @if( $startmonth <= 3 AND $endmonth>= 3
                                                                                    )
                                                                                    <option @if ($month==3) selected
                                                                                        @endif value="3">
                                                                                        March
                                                                                    </option>
                                                                                    @endif
                                                                                    @if ( $startmonth <= 4 AND $endmonth >= 4 )
                                                                                        <option @if( $month==4 )
                                                                                            selected @endif value="4">
                                                                                            April
                                                                                        </option>
                                                                                        @endif
                                                                                        @if($startmonth<=5 AND $endmonth>= 5)
                                                                                            <option @if( $month==5)
                                                                                                selected @endif
                                                                                                value="5">May
                                                                                            </option>
                                                                                            @endif
                                                                                            @if($startmonth <= 6 AND
                                                                                                $endmonth>=6)
                                                                                                <option @if ($month==6)
                                                                                                    selected @endif
                                                                                                    value="6">June
                                                                                                </option>
                                                                                                @endif
                                                                                                @if($startmonth <= 7 AND
                                                                                                    $endmonth>= 7)
                                                                                                    <option
                                                                                                        @if($month==7)
                                                                                                        selected @endif
                                                                                                        value="7">
                                                                                                        July
                                                                                                    </option>
                                                                                                    @endif
                                                                                                    @if($startmonth<=8 AND $endmonth>=8 )

                                                                                                        <option
                                                                                                            @if($month==8)
                                                                                                            selected
                                                                                                            @endif
                                                                                                            value="8">
                                                                                                            August
                                                                                                        </option>
                                                                                                        @endif
                                                                                                        @if($startmonth <= 9 AND $endmonth >= 9)
                                                                                                            <option
                                                                                                                @if($month==9)
                                                                                                                selected
                                                                                                                @endif
                                                                                                                value="9">
                                                                                                                September
                                                                                                            </option>
                                                                                                            @endif
                                                                                                            @if($startmonth <= 10 AND $endmonth >= 10)
                                                                                                                <option
                                                                                                                    @if($month==10)
                                                                                                                    selected
                                                                                                                    @endif
                                                                                                                    value="10">
                                                                                                                    October
                                                                                                                </option>
                                                                                                                @endif
                                                                                                                @if($startmonth <= 11  AND $endmonth>=11)
                                                                                                                    <option
                                                                                                                        @if($month==11)
                                                                                                                        selected
                                                                                                                        @endif
                                                                                                                        value="11">
                                                                                                                        November
                                                                                                                    </option>
                                                                                                                    @endif
                                                                                                                    @if($startmonth <= 12 AND $endmonth >= 12)
                                                                                                                        <option
                                                                                                                            @if($month==12)
                                                                                                                            selected
                                                                                                                            @endif
                                                                                                                            value="12">
                                                                                                                            December
                                                                                                                        </option>
                                                                                                                        @endif
                                                                                                                        @endif

                        </select>
                    </div>

                    {!! Form::close() !!}

                </div>





                <div class="well col-sm-12">


                    {!! Form::open(['action'=>'IndicatorsafterController@store', 'method'=>'POST']) !!}

                    <input name="year" type="hidden" value="{{$yr}}">
                    <input type="hidden" name="id" value={{$ind->id}}>
                    <input name="before_after" type="hidden" value={{$before_after}}>
                    <input name="month" type="hidden" value={{$month}}>

                    <div class="col-sm-6">
                        <p style="font-size: large;
    font-weight: bold;">Scoring unit:
                            @foreach ($units as $unit)
                            @if ($unit->id == $ind->unit)
                            {{$unit->name}}
                            @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p style="font-size: large;
                            font-weight: bold;">
                        Target: {{$ind->project_target}}
                        </p>
                    </div>
                    <div style="min-height:10px;">
                        <p>&nbsp</p>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            {{Form::label('person_responsible', 'Person responsible')}}
                            {{Form::text('person_responsible',$indicator->person_responsible , ['class' =>
                            'form-control', 'placeholder' => 'person responsible'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('baseline_target', 'Baseline')}}
                            {{Form::text('baseline_target',$ind->baseline_target , ['class' =>
                                                    'form-control', 'placeholder' => '','readonly' => 'true'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('project_target', 'Project target')}}
                            {{Form::text('project_target',$ind->project_target , ['class' =>
                                                    'form-control', 'placeholder' => '','readonly' => 'true'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('ovi_date', 'Expected date of achieving Indicator')}}
                            {{Form::date('ovi_date', $indicator->ovi_date, ['class' =>'form-control', 'placeholder'
                            => ''])}}
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          
                          @if ($before_after == "before")
                            <div class="col-sm-12">
                                {{Form::label('achieved', 'Actual target planned for the month')}}
                                {{Form::number('achieved', $indicator->monthly_total, ['class' => 'form-control',])}}
                            </div>
                            @endif
                            @if ($before_after == "after")
                            <div class="col-sm-12">
                                {{Form::label('achieved', 'Actual target achieved for the month')}}
                                {{Form::number('achieved', $indicator->monthly_total, ['class' => 'form-control',])}}
                            </div>

                            @endif
                            <div style="min-height:201px;">
                                <p>&nbsp</p>
                            </div>
                            
                        </div>


                        <a href="/indicators/{{$ind->project_id}}" class="btn btn-default" style="float:left;"><i
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