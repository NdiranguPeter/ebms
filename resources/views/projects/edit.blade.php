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
                    <a href="/projects">Projects</a>
                </li>
                /
                <li class="active">{{$project->name}}</li>
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
                    Edit projects
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <div class=" col-sm-6">
                        {!! Form::open(['action'=>['ProjectsController@update',$project->id], 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Project name')}}
                            {{Form::text('name', $project->name, ['class' => 'form-control', 'placeholder' =>
                            'project name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('irw_pin', 'IRW Pin')}}
                            {{Form::text('irw_pin', $project->irw_pin, ['class' => 'form-control', 'placeholder'
                            =>
                            'project code'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start date')}}
                            {{Form::date('start', $project->start, ['class' => 'form-control', 'placeholder' =>
                            'Start date'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('end', 'End date')}}
                            {{Form::date('end', $project->end, ['class' => 'form-control', 'placeholder' => 'End
                            date'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('location', 'Location')}}
                            {{Form::text('location', $project->location, ['class' => 'form-control', 'placeholder'
                            => 'Actual location the project is conducted'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('partners', 'Partners')}}
                            <select name="partners[]" id="" class="form-control multiselect" multiple="multiple"
                                role="multiselect">
                                @if (count($partners)>0)
                                @foreach ($partners as $partner)
                                @if($partner->name == $project->partners)
                                @php
                                $selected = "selected";
                                @endphp
                                @endif
                                @if($partner->name != $project->partners)
                                @php
                                $selected = "";
                                @endphp
                                @endif
                                <option value="{{$partner->id}}" {{$selected}}>{{$partner->name}}</option>
                                @endforeach

                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('ir_office', 'IR country office')}}
                            <select name="ir_office" id="ir_office"
                                class="form-control @error('ir_office') is-invalid @enderror">
                                <option value="{{$office->id}}" selected>{{$office->name}}</option>
                                <option value="1">IR Kenya</option>
                                <option value="2">IR Somalia</option>
                                <option value="3">IR Ethiopia</option>
                                <option value="4">IR Sudan</option>
                                <option value="5">IR South Sudan</option>

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('fo_pin', 'FO Pin')}}
                            {{Form::text('fo_pin', $project->fo_pin, ['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('donors', 'Donors')}}
                            <select name="donors[]" id="" class="form-control multiselect" multiple="multiple"
                                role="multiselect">
                                @if (count($donors)>0)
                                @foreach ($donors as $donor)
                                @if($donor->name == $project->donors)
                                @php
                                $selected = "selected";
                                @endphp
                                @endif
                                @if($donor->name != $project->donors)
                                @php
                                $selected = "";
                                @endphp
                                @endif
                                <option value="{{$donor->id}}" {{$selected}}>{{$donor->name}}</option>
                                @endforeach

                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('goal', 'Project Impact statement')}}
                            {{Form::textarea('goal', $project->goal, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'project goal'])}}
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('target_group', 'Target group')}}
                            <select name="target_group[]" id="target_group" multiple
                                class="form-control @error('target_group') is-invalid @enderror">
                                <option value="{{$target_group->id}}" selected>{{$target_group->name}}</option>
                                @if (count($target_groups)>0)
                                @foreach ($target_groups as $target_group)
                                <option value="{{$target_group->id}}">{{$target_group->name}}</option>
                                @endforeach

                                @else
                                <option value="">No target groups saved</option>
                                @endif

                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('stage', 'Project stage')}}
                            <select name="stage" id="stage" class="form-control @error('stage') is-invalid @enderror">
                                <option value="{{$project->stage}}" selected>{{$project->stage}}</option>
                                <option value="Identification">Identification (The project is being
                                    scooped)</option>
                                <option value="Implementation">Implementation (currently being implemented)</option>
                                <option value="Completion">Completion (Final activity has been completed)</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Suspended">Suspended (temporarily suspended) </option>
                                <option value="Archived">Archived</option>
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('type', 'Project type')}}
                            <select name="type" id="type" class="form-control @error('stage') is-invalid @enderror">
                                <option value="{{$project->type}}" selected>{{$project->type}}</option>
                                <option value="Humanitarian Assistance">Humanitarian Assistance</option>
                                <option value="Development Assistance">Development Assistance</option>
                                <option value="Confrict Prevention">Confrict Prevention</option>
                                <option value="Disaster risk reduction">Disaster risk reduction</option>

                            </select>
                        </div>
                        <hr>
                        <h5><b>Sector Impact Target</b></h5>
                        <br>
                        <div class="form-group">

                            <table id="dynamicTable">
                                <tr>
                                    <td style="width:40%;">
                                        {{Form::label('global_goal', 'Global Goal')}}
                                        <select name="g[0][global_goal]" class="form-control">
                                            <option
                                                value="Reducing the humanitarian impact on conflicts and natural disasters">
                                                Reducing the humanitarian impact on conflicts and natural
                                                disasters
                                            </option>
                                            <option
                                                value="Empowering community to emerge from poverty and vulnerability">
                                                Empowering
                                                community to emerge from poverty and vulnerability</option>

                                        </select>
                                    </td>
                                    <td>
                                        <label for="split"
                                            class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label>
                                        <input type="text" class="form-control" name="s[0][globalgoal_split]" value="">
                                    </td>
                                    <td style="vertical-align: bottom;"><button type="button" name="add" id="add"
                                            class="btn btn-success">+</button></td>
                                </tr>
                            </table>

                        </div>
                        <div class="form-group">

                            <table id="dynamicTable2">

                                <tr>
                                    <td style="width:40%;" class="sectors">
                                        {{Form::label('sector', 'Project sector')}}
                                        <select name="c[0][sector]" class="form-control">
                                            @foreach ($sectors as $sector)
                                            <option value={{$sector->id}}>{{$sector->name}}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td class="splits">
                                        <label for="split"
                                            class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label>
                                        <input id="split" type="text"
                                            class="form-control @error('split') is-invalid @enderror"
                                            name="p[0][sector_split]" value="">
                                    </td>

                                    <td style="vertical-align: bottom;"><button type="button" name="add2" id="add2"
                                            class="btn btn-success">+</button></td>


                                </tr>


                            </table>

                        </div>


                        <div class="form-group">

                            <table id="dynamicTable3">
                                <tr>
                                    <td style="width:40%;">
                                        {{Form::label('sdg', 'Target SDGs')}}
                                        <select name="d[0][sdg]" id="sdg"
                                            class="form-control @error('sdg') is-invalid @enderror">
                                            <option value="No Poverty">No Poverty</option>
                                            <option value="Zero Hunger">Zero Hunger</option>
                                            <option value="Good Health and Well-being">Good Health
                                                and
                                                Well-being
                                            </option>
                                            <option value="Quality Education">Quality Education
                                            </option>
                                            <option value="Gender Equality">Gender Equality</option>
                                            <option value="Clean Water and Sanitation">Clean Water
                                                and
                                                Sanitation
                                            </option>
                                            <option value="Affordable and Clean Energy">Affordable
                                                and Clean
                                                Energy
                                            </option>
                                            <option value="Decent Work and Economic Growth">Decent
                                                Work and
                                                Economic
                                                Growth
                                            </option>
                                            <option value="Industry, Innovation and Infrastructure">
                                                Industry, Innovation
                                                and
                                                Infrastructure</option>
                                            <option value="Reduced Inequality">Reduced Inequality
                                            </option>
                                            <option value="Sustainable Cities and Communities">
                                                Sustainable
                                                Cities and
                                                Communities
                                            </option>
                                            <option value="Responsible Consumption and Production">
                                                Responsible
                                                Consumption and
                                                Production</option>
                                            <option value="Climate Action">Climate Action</option>
                                            <option value="Life Below Water">Life Below Water
                                            </option>
                                            <option value="Life on Land">Life on Land</option>
                                            <option value="Peace and Justice Strong Institutions">
                                                Peace and
                                                Justice
                                                Strong
                                                Institutions</option>
                                            <option value="Partnerships to achieve the Goal">
                                                Partnerships to
                                                achieve the
                                                Goal
                                            </option>

                                        </select>
                                    </td>
                                    <td>
                                        <label for="split"
                                            class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label>
                                        <input id="split" type="text"
                                            class="form-control @error('split') is-invalid @enderror"
                                            name="r[0][sdg_split]" value="">

                                    </td>
                                    <td style="vertical-align: bottom;"><button type="button" name="add3" id="add3"
                                            class="btn btn-success">+</button>
                                    </td>
                                </tr>
                            </table>


                        </div>
                        <hr>
                        <div class="form-group">
                            {{Form::label('budget', 'Project fund')}}
                            {{Form::text('budget', $project->budget, ['class' => 'form-control', 'placeholder' => 'project fund'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('currency', 'Project currency')}}
                            <select name="currency" id="currency"
                                class="form-control @error('currency') is-invalid @enderror">
                                <option value="{{$project->currency}}" selected>{{$project->currency}}</option>
                                @foreach ($currencies as $currency)
                                <option value="{{$currency->name}}">{{$currency->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Project description')}}
                            {{Form::textarea('description', $project->description, ['id' => 'article-ckeditor',
                            'class' => 'form-control', 'placeholder' => 'project description. e.g objectives'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Edit project', ['class'=>'btn btn-primary'])}}
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var i = 0;
       
             $("#add").click(function(){
   
              ++i;
   
              $("#dynamicTable").append('<tr><td style="width:40%;">{{Form::label('global_goal', 'Global Goal')}} <select name="g['+i+'][global_goal]" id="global_goal" class="form-control @error('global_goal') is-invalid @enderror"> <option value="Reducing the humanitarian impact on conflicts and natural disasters">Reducing the humanitarian impact on conflicts and natural disasters</option><option value="Empowering community to emerge from poverty and vulnerability">Empowering community to emerge from poverty and vulnerability</option></select></td><td><label for="split" class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label><input id="split" type="text" class="form-control @error('split') is-invalid @enderror" name="s['+i+'][global_split]" value=""> </td> <td style="vertical-align: bottom;"><button type="button" class="btn btn-danger remove-tr">X</button></td></tr>');
                });


                $("#add2").click(function(){
   
              ++i;
   
              $("#dynamicTable2").append('<tr><td style="width:40%;" class="sectors"> {{Form::label('sector', 'Project sector')}} <select name="c[0][sector]" class="form-control"> @foreach ($sectors as $sector) <option value={{$sector->id}}>{{$sector->name}}</option> @endforeach </select> </td><td class="splits"> <label for="split" class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label> <input id="split" type="text" class="form-control @error('split') is-invalid @enderror"  name="p[0][sector_split]" value=""> </td> <td style="vertical-align: bottom;"><button type="button" class="btn btn-danger remove-tr1">X</button></td></tr>');
                });


                 $("#add3").click(function(){
   
              ++i;
                 $("#dynamicTable3").append('<tr><td style="width:40%;">{{Form::label('sdg', 'Target SDGs')}}<select name="d[0][sdg]" id="sdg" class="form-control @error('sdg') is-invalid @enderror"><option value="No Poverty">No Poverty</option><option value="Zero Hunger">Zero Hunger</option><option value="Good Health and Well-being">Good Health and Well-being</option><option value="Quality Education">Quality Education</option><option value="Gender Equality">Gender Equality</option><option value="Clean Water and Sanitation">Clean Water and Sanitation</option><option value="Affordable and Clean Energy">Affordable and Clean Energy </option><option value="Decent Work and Economic Growth">Decent Work and Economic Growth</option><option value="Industry, Innovation and Infrastructure">Industry, Innovation and Infrastructure</option><option value="Reduced Inequality">Reduced Inequality</option><option value="Sustainable Cities and Communities">Sustainable Cities and Communities</option><option value="Responsible Consumption and Production">Responsible Consumption and Production</option><option value="Climate Action">Climate Action</option><option value="Life Below Water">Life Below Water</option><option value="Life on Land">Life on Land</option><option value="Peace and Justice Strong Institutions">Peace and Justice Strong Institutions</option><option value="Partnerships to achieve the Goal">Partnerships to achieve the Goal</option></select></td><td><label for="split" class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label><input id="split" type="text" class="form-control @error('split') is-invalid @enderror" name="r[0][sdg_split]" value=""></td><td style="vertical-align: bottom;"><button type="button" class="btn btn-danger remove-tr1">X</button></td></tr>');
                 });       
                 
                 $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
    $(document).on('click', '.remove-tr1', function(){
    $(this).parents('tr').remove();
    });
   
</script>
@endsection