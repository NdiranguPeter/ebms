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
                    <i class="ace-icon fa fa-users"></i>
                    <a href="/partners">Partners</a>
                </li>


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
                    Add Partner
                </h1>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">
                @isset($record)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endisset($error)

                <div class="well col-sm-8">
                    {!! Form::open(['action'=>'PartnersController@store', 'method'=>'POST']) !!}
                    @csrf

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
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="Foundation">Foundation</option>
                            <option value="Non Governmental Organization(NGO)">Non Governmental Organization(NGO)
                            </option>
                            <option value="Local/Regional NGO">Local/Regional NGO</option>
                            <option value="National NGO">National NGO</option>
                            <option value="International NGO">International NGO</option>
                            <option value="Governmental Organization">Governmental Organization</option>
                            <option value="Public sector organization">Public sector organization</option>
                            <option value="Public/Private Partnership">Public/Private Partnership</option>
                            <option value="Multilateral Organization">Multilateral Organization</option>
                            <option value="Company">Company</option>
                            <option value="Consultancy Office">Consultancy Office</option>
                            <option value="Cooperative">Cooperative</option>
                            <option value="Farm/Agricultural Institute">Farm/Agricultural Institute</option>
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
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
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
                    <div class="form-group">
                        {{Form::label('description', 'Description')}}
                        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'description'])}}
                    </div>
                    <div style="float:right;">
                        {{Form::submit('Save Partner', ['class'=>'btn btn-primary'])}}
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection