<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public App | @yield('page_title')</title>

    @vite('resources/css/app.css')
</head>

<body>
    @include('master.partials.navbar')
    @yield('content')
    @include('master.partials.footer')
</body>

</html>
