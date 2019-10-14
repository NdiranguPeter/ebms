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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="background-color:#0081c7; ">

                @yield('content')
            </div>

        </div>

    </div>
</body>

</html>