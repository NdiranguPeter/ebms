@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="background-color:#395acd; margin-top: 7%; padding: 50px;">

            <img src="storage/background/islamic_relief.png" alt="islamic relief logo" class="img-fluid mx-auto d-block"
                style="margin-bottom: 10px;">
            <h1 style="color: #fff; font-weight: bold; font-size: xx-large;">Electronic Beneficiaries Management System
            </h1>
            <h2 style="color: #fff; font-weight: bold; text-align:center;">(E-BMS)</h2>
            <div class="text-center" style="margin-top:30px;">
                <a class="btn btn-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="btn btn-primary" href="{{ route('register') }}"
                    style="margin-left: 30px;">{{ __('Register') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection