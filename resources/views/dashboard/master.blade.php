<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <script src="{{asset("js/app.js")}}"></script>
    <title>Mòdulo Admin</title>
</head>
<body>
    
    @include('dashboard.partials.nav-header-main')
    @include('dashboard.partials.session-flash-status')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>