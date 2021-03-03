<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <title>Mòdulo Admin</title>
    <style>
        body{
            background-color: darkslategray;
        }
    </style>
</head>
<body>
    @include('web.partials.nav-header-main')
    <div class="container" id="app">
        @yield('content')
    </div>
    @include('web.partials.footer-main')
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>