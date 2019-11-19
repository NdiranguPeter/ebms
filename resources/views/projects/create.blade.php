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
                <li class="active">Create project</li>
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
                    Create projects
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @include('layouts.messages')
                <div class="well col-sm-12">
                    <div class=" col-sm-6">

                        {!! Form::open(['action'=>'ProjectsController@store', 'method'=>'POST']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{Form::label('name', 'Project Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Project name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('irw_pin', 'IRW Pin Code')}}
                            {{Form::text('irw_pin', '', ['class' => 'form-control', 'placeholder' => 'Project irw_pin'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start date')}}
                            {{Form::date('start', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Start date'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('end', 'End date')}}
                            {{Form::date('end', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'End date'])}}
                        </div>

                        <div class="form-group" id="field">
                            {{Form::label('location', 'Location')}}
                            {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Actual location the project is conducted'])}}
                        </div>
                        <div class="form-group">
                            <a style="float:right;" data-toggle="modal" data-target="#exampleModal">Create new partner
                            </a>
                            {{Form::label('partners', 'Partners')}}
                            <select name="partners[]" id="" class="form-control multiselect" multiple="multiple"
                                role="multiselect">
                                @if (count($partners)>0)
                                @foreach ($partners as $partner)
                                <option value="{{$partner->id}}">{{$partner->name}}</option>
                                @endforeach
                                @else
                                <option value="">No partner</option>
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('ir_office', 'IR Country Office')}}
                            <select name="ir_office" id="ir_office"
                                class="form-control @error('ir_office') is-invalid @enderror">
                                <option value="1">IR Kenya</option>
                                <option value="2">IR Somalia</option>
                                <option value="3">IR Ethiopia</option>
                                <option value="4">IR Sudan</option>
                                <option value="5">IR South Sudan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('fo_pin', 'FO Pin')}}
                            {{Form::text('fo_pin', '', ['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                            <a style="float:right;" data-toggle="modal" data-target="#donorModal">Create new donor
                            </a>
                            {{Form::label('donors', 'Donors')}}
                            <select name="donors[]" id="" class="form-control multiselect" multiple="multiple"
                                role="multiselect">
                                @if (count($donors)>0)
                                @foreach ($donors as $donor)
                                <option value="{{$donor->id}}">{{$donor->name}}</option>
                                @endforeach

                                @else
                                <option value="">No donor saved yet</option>
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('goal', 'Project Goal')}}
                            {{Form::textarea('goal', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'project goal'])}}
                        </div>

                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            {{Form::label('target_group', 'Target Group')}}
                            <select style="min-width: 450px !important;" name="target_group[]" id="target_group"
                                class="form-control multiselect" multiple="multiple" role="multiselect">
                                @if (count($target_groups)>0)
                                @foreach ($target_groups as $target_group)
                                <option value="{{$target_group->id}}">{{$target_group->name}}</option>
                                @endforeach

                                @else
                                <p>No target groups saved</p>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('stage', 'Project Stage')}}
                            <select name="stage" id="stage" class="form-control @error('stage') is-invalid @enderror">
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
                            {{Form::label('type', 'Project Type')}}
                            <select name="type" id="type" class="form-control @error('stage') is-invalid @enderror">
                                <option value="Humanitarian Assistance">Humanitarian Assistance</option>
                                <option value="Development Assistance">Development Assistance</option>
                                <option value="Confrict Prevention">Conflict Prevention</option>
                                <option value="Disaster risk reduction">Disaster Risk Reduction</option>
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
                                                Empowering community to emerge from poverty and vulnerability</option>

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
                                        {{Form::label('sector', 'Project Sector')}}
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
                                            <option value="Good Health and Well-being">Good Health and Well-being
                                            </option>
                                            <option value="Quality Education">Quality Education</option>
                                            <option value="Gender Equality">Gender Equality</option>
                                            <option value="Clean Water and Sanitation">Clean Water and Sanitation
                                            </option>
                                            <option value="Affordable and Clean Energy">Affordable and Clean Energy
                                            </option>
                                            <option value="Decent Work and Economic Growth">Decent Work and Economic
                                                Growth
                                            </option>
                                            <option value="Industry, Innovation and Infrastructure"> Industry,
                                                Innovation and Infrastructure</option>
                                            <option value="Reduced Inequality">Reduced Inequality
                                            </option>
                                            <option value="Sustainable Cities and Communities">Sustainable Cities and
                                                Communities</option>
                                            <option value="Responsible Consumption and Production"> Responsible
                                                Consumption and Production</option>
                                            <option value="Climate Action">Climate Action</option>
                                            <option value="Life Below Water">Life Below Water
                                            </option>
                                            <option value="Life on Land">Life on Land</option>
                                            <option value="Peace and Justice Strong Institutions">Peace and Justice
                                                Strong Institutions</option>
                                            <option value="Partnerships to achieve the Goal">Partnerships to achieve the
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
                            {{Form::label('budget', 'Project budget')}}
                            {{Form::text('budget', '', ['class' => 'form-control', 'placeholder' => 'project fund'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('currency', 'Project currency')}}
                            <select name="currency" id="currency"
                                class="form-control @error('currency') is-invalid @enderror">
                                @foreach ($currencies as $currency)
                                <option value="{{$currency->name}}">{{$currency->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Project description')}}
                            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'project description. e.g objectives'])}}
                        </div>
                        <div style="float:right;">
                            {{Form::submit('Create project', ['class'=>'btn btn-primary'])}}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>




                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create project partner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-sm-12">
                                <div class=" col-sm-6">
                                    {!! Form::open(['action'=>'PartnersController@store', 'method'=>'POST']) !!}
                                    @csrf
                                    <input type="hidden" name="from" value="project">

                                    <div class="form-group">
                                        {{Form::label('name', 'Partner name')}}
                                        {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'name'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('acronym', 'Acronym')}}
                                        {{Form::text('acronym','', ['class' => 'form-control', 'placeholder' => 'Acronym'])}}
                                    </div>


                                    <div class="form-group">
                                        {{Form::label('email', 'Email')}}
                                        {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('type', 'Type')}}
                                        <select name="type" id="type"
                                            class="form-control @error('type') is-invalid @enderror">
                                            <option value="Foundation">Foundation</option>
                                            <option value="Non Governmental Organization(NGO)">Non Governmental
                                                Organization(NGO)
                                            </option>
                                            <option value="Local/Regional NGO">Local/Regional NGO</option>
                                            <option value="National NGO">National NGO</option>
                                            <option value="International NGO">International NGO</option>
                                            <option value="Governmental Organization">Governmental Organization</option>
                                            <option value="Public sector organization">Public sector organization
                                            </option>
                                            <option value="Public/Private Partnership">Public/Private Partnership
                                            </option>
                                            <option value="Multilateral Organization">Multilateral Organization</option>
                                            <option value="Company">Company</option>
                                            <option value="Consultancy Office">Consultancy Office</option>
                                            <option value="Cooperative">Cooperative</option>
                                            <option value="Farm/Agricultural Institute">Farm/Agricultural Institute
                                            </option>
                                            <option value="Independent entrepreneur">Independent entrepreneur</option>
                                            <option value="Bank">Bank</option>
                                            <option value="Micro Financing Institute">Micro Financing Institute</option>
                                            <option value="Educational Institute">Educational Institute</option>
                                            <option value="Training Institute">Training Institute</option>
                                            <option value="Research Institute">Research Institute</option>
                                            <option value="Medical Institute">Medical Institute</option>
                                            <option value="Religious Institute">Religious Institute</option>
                                            <option value="Emergency services">Emergency services</option>
                                            <option value="Police">Police</option>
                                            <option value="Military">Military</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('role', 'Role')}}
                                        <select name="role" id="role"
                                            class="form-control @error('role') is-invalid @enderror">
                                            <option value="Lead Organization">Lead Organization</option>
                                            <option value="Partner">Partner</option>
                                            <option value="Implementing Partner">Implementing Partner</option>
                                            <option value="Financial Institution">Financial Institution</option>
                                            <option value="Supplier">Supplier</option>
                                            <option value="Service Provider">Service Provider</option>
                                            <option value="Auditor">Auditor</option>
                                            <option value="Network">Network</option>
                                            <option value="Reporting Organization">Reporting Organization</option>
                                            <option value="Other">Other</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('phone', 'Phone')}}
                                        {{Form::number('phone', '', ['class' => 'form-control', 'placeholder' => 'phone'])}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('address', 'Address')}}
                                        {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{Form::label('description', 'Description')}}
                                        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'description'])}}
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                {{Form::submit('Save', ['class'=>'btn btn-primary right'])}}

                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="donorModal" tabindex="-1" role="dialog" aria-labelledby="donorModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="donorModalLabel">Create project donor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-sm-12">

                                {!! Form::open(['action'=>'DonorsController@store', 'method'=>'POST']) !!}
                                @csrf
                                <input type="hidden" name="from" value="project">

                                <div class="form-group col-sm-6">
                                    {{Form::label('name', 'Donor name')}}
                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'donor name'])}}
                                </div>
                                <div class="form-group col-sm-6">
                                    {{Form::label('type', 'Donor type')}}
                                    {{Form::text('type', '', ['class' => 'form-control', 'placeholder' => 'donor type'])}}
                                </div>
                                <div class="form-group col-sm-6">
                                    {{Form::label('address', 'Donor address')}}
                                    {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'donor address'])}}
                                </div>
                                <div class="form-group col-sm-6">
                                    {{Form::label('email', 'Donor email')}}
                                    {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'donor email'])}}
                                </div>
                                <div class="form-group col-sm-6">
                                    {{Form::label('phone', 'Donor phone')}}
                                    {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'donor phone'])}}
                                </div>
                                <div class="form-group col-sm-6">
                                    {{Form::label('description', 'Donor description')}}
                                    {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'project description. e.g objectives'])}}
                                </div>

                            </div>

                            <div class="modal-footer">
                                {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                            </div>
                            {!! Form::close() !!}
                        </div>
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

<script>
    $(document).ready(function() {
        // show the alert
        setTimeout(function() {
        $(".alert").alert('close');
        }, 1600);
        });
        
</script>

@endsection