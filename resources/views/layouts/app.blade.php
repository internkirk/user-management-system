<!DOCTYPE html>
<html lang="en"  dir="rtl" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

    @yield('links')

    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title' , ' User Management')</title>
</head>

<body class="dark:bg-slate-700">

    @include('partials.navbar')

    @yield('body')




    @yield('scripts')
</body>

</html>