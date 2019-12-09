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
                <li>{!!$output->name!!}</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Edit output activity
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
                    {!! Form::open(['action'=>['ActivitiesController@update',$activity->id], 'method'=>'POST']) !!}
                    <input name="id" type="hidden" value="{{$output->id}}">
                    <input name="total_male" type="hidden" value={{$activity->total_male}}>
                    <input name="total_female" type="hidden" value={{$activity->total_female}}>
                    <input name="target_baseline" type="hidden" value=0>
                    <input name="total_beneficiaries" type="hidden" value={{$activity->total_beneficiaries}}>
                    <input name="currency" type="hidden" value={{$project->currency}}>
                    <div class="col-sm-12">
                        <p style="color: green; font-weight:bold;">{!!$activity->name!!}</p>
                    </div>
                    <br />
                    <br />
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('scoring', 'Project scoring')}}
                            <select name="scoring" id="scoring"
                                class="form-control @error('scoring') is-invalid @enderror">
                                <option value="{{$activity->scoring}}" selected>{{$activity->scoring}}</option>
                                <option value="value">Value</option>
                                <option value="percentage">Percentage</option>
                                <option value="formula">Formula</option>

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('unit', 'Scoring unit')}}
                            <select name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror">
                                @if (count($units)>0)
                                <option value="{{$activity->unit_id}}" selected>{{$activity->unit}}</option>
                                @foreach ($units as $unit)
                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach

                                @else
                                <p>No units</p>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'start')}}
                            {{Form::date('start', $activity->start, ['class' => 'form-control', 'placeholder' => 'Start date'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('end', 'end')}}
                            {{Form::date('end', $activity->end, ['class' => 'form-control', 'placeholder' => 'End date'])}}
                        </div>
                        {{-- <div class="form-group">
                            {{Form::label('target_baseline', 'Target at baseline')}}
                        {{Form::text('target_baseline', $activity->baseline_target, ['class' => 'form-control', 'placeholder' => 'Target at baseline'])}}
                    </div> --}}
                    <div class="form-group">
                        {{Form::label('project_target', 'Project target')}}
                        {{Form::text('project_target',$activity->project_target, ['class' => 'form-control', 'placeholder' => 'Project target'])}}
                    </div>
                    <h5>Direct beneficiaries</h5>
                    <div class="form-group">
                        {{Form::label('gender_age_distribution', 'Geneder/Age distribution')}}
                        <table class="table table-bordered">
                            <th>Age group</th>
                            <th>Male</th>
                            <th>Female</th>
                            <tbody>
                                <tr>
                                    <td>0 - 2</td>
                                    <td><input name="zero_two_male" type="number" value={{$activity->zero_two_male}}>
                                    </td>
                                    <td><input name="zero_two_female" type="number"
                                            value={{$activity->zero_two_female}}></td>
                                </tr>
                                <tr>
                                    <td>3 - 5</td>
                                    <td><input name="three_five_male" type="number"
                                            value={{$activity->three_five_male}}></td>
                                    <td><input name="three_five_female" type="number"
                                            value={{$activity->three_five_female}}></td>
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
                                            value={{$activity->fifty_fiftynine_male}}></td>
                                    <td><input name="fifty_fiftynine_female" type="number"
                                            value={{$activity->fifty_fiftynine_female}}></td>

                                </tr>
                                <tr>
                                    <td>60 - 69</td>
                                    <td><input name="sixty_sixtynine_male" type="number"
                                            value={{$activity->sixty_sixtynine_male}}></td>
                                    <td><input name="sixty_sixtynine_female" type="number"
                                            value={{$activity->sixty_sixtynine_female}}></td>

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
                                            value={{$activity->above_eighty_male}}></td>
                                    <td><input name="above_eighty_female" type="number"
                                            value={{$activity->above_eighty_female}}></td>

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
                            <br />
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>People leaving with disability</h5>

                        <div class="col-sm-6">
                            {{Form::label('disabled_male', 'Male')}}
                            {{Form::number('disabled_male', $activity->disabled_male, ['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="col-sm-6">
                            {{Form::label('disabled_female', 'Female')}}
                            {{Form::number('disabled_female', $activity->disabled_female, ['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">


                    <div class="form-group">
                        {{Form::label('partners', 'Implementing Patners')}}
                        <select name="partners" id="partners"
                            class="form-control @error('scoring') is-invalid @enderror">
                            <option value={{$activity->partners}} selected>{{$activity->partners}}</option>
                            @foreach ($partners as $partner)
                            <option value={{$partner->name}}>{{$partner->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        {{Form::label('person_responsible', 'Person responsible')}}
                        {{Form::text('person_responsible', $activity->person_responsible, ['class' => 'form-control', 'placeholder' => 'Person responsible'])}}
                    </div>



                    <div class="form-group">
                        {{Form::label('budget_unit', 'Budgeting unit')}}
                        <select name="budget_unit" id="budget_unit"
                            class="form-control @error('budget_unit') is-invalid @enderror">
                            <option value='{{$activity->budget_unit}}'>{{$activity->budget_unit}}</option>
                            <option value='FTE'>FTE</option>
                            <option value='Pieces'>Pieces</option>
                            <option value='Persons'>Persons</option>
                            <option value='Items'>Items</option>
                            <option value='Units'>Units</option>
                            <option value='Missions'>Missions</option>
                            <option value='Vehicles'>Vehicles</option>
                            <option value='Farmers'>Farmers</option>
                            <option value='Farmer organizations'>Farmer organizations</option>
                            <option value='Litres'>Litres</option>
                            <option value='Workshop'>Workshop</option>
                            <option value='Fields'>Fields</option>
                            <option value='Events'>Events</option>
                            <option value='Audits'>Audits</option>

                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('no_unit', 'Number of budgeting units')}}
                        {{Form::text('no_unit', $activity->no_unit, ['class' => 'form-control', 'placeholder' => 'Number of budgeting units'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('cost_unit', 'Cost per budgeting unit')}}
                        {{Form::text('cost_unit', $activity->cost_unit, ['class' => 'form-control', 'placeholder' => 'Cost per budgeting units'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('budget', 'Budget')}}
                        {{Form::text('budget', '', ['class' => 'form-control','id'=>'budget', 'readonly'=>'true','onmouseover'=>'changeThis(this)'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('budget_code', 'Budget code')}}
                        {{Form::text('budget_code', $activity->budget_code, ['class' => 'form-control', 'placeholder' => 'Budget code'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('activity', 'Activity name')}}
                        {{Form::textarea('activity', $activity->name, [ 'class' => 'form-control', 'placeholder' => 'Activity name'])}}
                    </div>
                    <a href="/activities/output/{{$output->id}}" class="btn btn-default" style="float:left;"><i
                            class="ace-icon fa fa-arrow-circle-o-left"></i>Back to activities</a>
                    <div style="float:right;">
                        {{Form::submit('Update activity', ['class'=>'btn btn-primary'])}}
                    </div>
                </div>
                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function changeThis(x){
        
	var formInput = document.getElementById('cost_unit').value;
	var formInput2 = document.getElementById('no_unit').value;
	document.getElementById('budget').innerHTML = formInput;
    x.value = formInput*formInput2;
}
</script>

@endsection