<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EBMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color:#0081c7">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8" style="justify-content: center;
  text-align: center; background-color:#0081c7; margin-top: 7%; padding: 50px;">

                <img src="{{ asset('storage/logo.jpg') }}" alt="islamic relief logo" class="img-fluid mx-auto d-block"
                    style="margin-bottom: 10px;">
                <h1 style="color: #fff; font-weight: bold; font-size: 30px;">Electronic Beneficiaries Management
                    System</h1>
                <h2 style="color: #fff; font-weight: bold; text-align:center;">(E-BMS)</h2>

                <div class="text-center" style="margin-top:30px;">
                    @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                        <a class="btn btn-success" href="{{ url('/home') }}">Dashboard</a>
                        @else
                        <a class="btn btn-success" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                        <a class="btn btn-primary" style="margin-left: 30px;"
                            href="{{ route('register') }}">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</body>

</html>