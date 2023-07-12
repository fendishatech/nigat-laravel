<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | @yield('page_title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('head_links')
</head>

<body>
    {{-- @yield('content') --}}
    <div class="flex h-screen">
        <aside class="w-24 sm:w-52 xl:w-64 bg-gray-800 text-gray-300 sticky top-0 overflow-y-auto">
            <x-sidebar title="Hello" />
        </aside>
        <div class="flex-1 bg-gray-100 overflow-y-auto">
            {{-- Navbar --}}
            @include('master.partials.navbar')
            {{-- content --}}
            @yield('content')
            {{-- Footer --}}
            @include('master.partials.footer')
        </div>
    </div>

    @yield('script_section')
</body>

</html>
