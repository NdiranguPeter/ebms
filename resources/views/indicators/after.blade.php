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
                    <p>{!!$ind->name!!}</p>

                    {!! Form::open(['action'=>'IndicatorsController@before2']) !!}
                    <div class="form-group">
                        <input name="before_after" type="hidden" value={{$before_after}}>
                        <input type="hidden" name="indicatorID" value={{$ind->id}}>
                        {{Form::label('year', 'Select year')}} 
                        <select name="year" id="year" class="form-control @error('year') is-invalid @enderror" onchange="this.form.submit()">
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
                            @for ($i =$startyr; $i <= $endyear; $i++) <option value={{$i}} @if ($yr == $i)
                                selected
                            @endif>{{$i}}</option>
                                @endfor
                        </select>
                    </div>

                </div>
                <div class="well col-sm-12">
                    {!! Form::close() !!}

                    {!! Form::open(['action'=>'IndicatorsafterController@store', 'method'=>'POST']) !!}
                 
                    <input name="year" type="hidden" value="{{$yr}}">
                   <input type="hidden" name="id" value={{$ind->id}}>
                    <input name="before_after" type="hidden" value={{$before_after}}>

                    <div class="col-sm-6">
                        <p>Scoring unit:
                        @foreach ($units as $unit)
                            @if ($unit->id == $ind->unit)
                            {{$unit->name}}
                            @endif
                        @endforeach
                      </p>
                    </div>
                    <div class="col-sm-6">
                        Target: {{$ind->project_target}}
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
                            {{Form::label('activities_distribution', 'Indicator/Time distribution')}}
                            <table class="table table-bordered">
                                <thead>
                                    <th>Period</th>
                                    @if ($before_after == 'before')
                                        <th>Planned</th>
                                    @endif
                                    @if ($before_after == 'after')
                                    <th>Achieved</th>
                                    @endif
                                    
                                </thead>
                                <tbody>
                                    @if($startyear != $endyear)
                                    @if($startmonth <= 1) <tr>
                                        <td>January</td>
                                        <td><input name="jan" type="number" value={{$indicator->jan}}></td>

                                        </tr>
                                        @endif

                                        @if($startmonth <= 2) <tr>
                                            <td>February</td>
                                            <td><input name="feb" type="number" value={{$indicator->feb}}></td>
                                            </tr>
                                            @endif
                                            @if($startmonth <= 3) <tr>
                                                <td>March</td>
                                                <td><input name="mar" type="number" value={{$indicator->mar}}></td>
                                                </tr>
                                                @endif
                                                @if($startmonth <= 4 ) <tr>
                                                    <td>April</td>
                                                    <td><input name="apr" type="number" value={{$indicator->apr}}>
                                                    </td>
                                                    </tr>
                                                    @endif
                                                    @if($startmonth <= 5) <tr>
                                                        <td>May</td>
                                                        <td><input name="may" type="number" value={{$indicator->may}}>
                                                        </td>
                                                        </tr>
                                                        @endif
                                                        @if($startmonth <= 6 ) <tr>
                                                            <td>June</td>
                                                            <td><input name="jun" type="number"
                                                                    value={{$indicator->jun}}></td>
                                                            </tr>
                                                            @endif
                                                            @if($startmonth <= 7) <tr>
                                                                <td>July</td>
                                                                <td><input name="jul" type="number"
                                                                        value={{$indicator->jul}}></td>
                                                                </tr>
                                                                @endif
                                                                @if($startmonth <= 8) <tr>
                                                                    <td>August</td>
                                                                    <td><input name="aug" type="number"
                                                                            value={{$indicator->aug}}>
                                                                    </td>
                                                                    </tr>
                                                                    @endif
                                                                    @if($startmonth <= 9) <tr>
                                                                        <td>September</td>
                                                                        <td><input name="sep" type="number"
                                                                                value={{$indicator->sep}}>
                                                                        </td>
                                                                        </tr>
                                                                        @endif
                                                                        @if($startmonth <= 10) <tr>
                                                                            <td>October</td>
                                                                            <td><input name="oct" type="number"
                                                                                    value={{$indicator->oct}}>
                                                                            </td>
                                                                            </tr>
                                                                            @endif
                                                                            @if($startmonth <= 11 ) <tr>
                                                                                <td>November</td>
                                                                                <td><input name="nov" type="number"
                                                                                        value={{$indicator->nov}}>
                                                                                </td>
                                                                                </tr>
                                                                                @endif
                                                                                @if($startmonth <= 12) <tr>
                                                                                    <td>December</td>
                                                                                    <td><input name="dec" type="number"
                                                                                            value={{$indicator->dec}}>
                                                                                    </td>
                                                                                    </tr>
                                                                                    @endif
                                                                                    @endif


                                                                                    @if($startyear == $endyear)

                                                                                    @if($startmonth <= 1 AND $endmonth>=
                                                                                        1)
                                                                                        <tr>
                                                                                            <td>January</td>
                                                                                            <td><input name="jan"
                                                                                                    type="number"
                                                                                                    value={{$indicator->jan}}>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endif
                                                                                        @if($startmonth <= 2 AND
                                                                                            $endmonth>= 2)
                                                                                            <tr>
                                                                                                <td>February</td>
                                                                                                <td><input name="feb"
                                                                                                        type="number"
                                                                                                        value={{$indicator->feb}}>
                                                                                                </td>
                                                                                            </tr>
                                                                                            @endif
                                                                                            @if($startmonth <= 3 AND
                                                                                                $endmonth>=3) <tr>
                                                                                                    <td>March</td>
                                                                                                    <td><input
                                                                                                            name="mar"
                                                                                                            type="number"
                                                                                                            value={{$indicator->mar}}>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @endif
                                                                                                @if($startmonth <= 4 AND
                                                                                                    $endmonth>= 4)
                                                                                                    <tr>
                                                                                                        <td>April</td>
                                                                                                        <td>
                                                                                                            <input
                                                                                                                name="apr"
                                                                                                                type="number"
                                                                                                                value={{$indicator->apr}}>
                                                                                                        </td>
                                                                                                    </tr>
@endif
@if($startmonth <=5 AND $endmonth >=5)
    <tr>
        <td>May</td>
        <td><input name="may" type="number" value={{$indicator->may}}>
        </td>
    </tr>
    @endif
    @if($startmonth<= 6 AND $endmonth >=6) <tr>
            <td>June
            </td>
            <td><input name="jun" type="number" value={{$indicator->jun}}>
            </td>
        </tr>
        @endif

        @if($startmonth <= 7 AND $endmonth >=7)
            <tr>
                <td>July
                </td>
                <td><input name="jul" type="number" value={{$indicator->jul}}>
                </td>
            </tr>
            @endif
            @if($startmonth <= 8 AND $endmonth >=8)
                <tr>
                    <td>August
                    </td>
                    <td><input name="aug" type="number" value={{$indicator->aug}}>
                    </td>
                </tr>
                @endif
                @if($startmonth <= 9 AND $endmonth >=9)
                    <tr>
                        <td>September
                        </td>
                        <td><input name="sep" type="number" value={{$indicator->sep}}>
                        </td>
                    </tr>
                    @endif
                    @if($startmonth <= 10 AND $endmonth >=10)
                        <tr>
                            <td>October
                            </td>
                            <td><input name="oct" type="number" value={{$indicator->oct}}>
                            </td>
                        </tr>
                        @endif
                        @if($startmonth <= 11 AND $endmonth >=11)
                            <tr>
                                <td>November
                                </td>
                                <td><input name="nov" type="number" value={{$indicator->nov}}>
                                </td>
                            </tr>
                            @endif
                            @if($startmonth <= 12 AND $endmonth >=12)
                                <tr>
                                    <td>December
                                    </td>
                                    <td><input name="dec" type="number" value={{$indicator->dec}}>
                                    </td>
                                </tr>
                                @endif
                                  @endif


                                </tbody>
                            </table>
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