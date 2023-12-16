<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script data-navigate-track>
        try {
            document.documentElement.setAttribute("data-theme", localStorage.getItem("theme"))

            if (localStorage.getItem("theme") === null) {
                document.documentElement.setAttribute("data-theme", 'light')
            }
        } catch (e) {
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
<section class="antialiased">
    <div class="flex flex-col items-center justify-center gap-3 px-6 mx-auto h-screen">
        <div class="flex items-center text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="h-16" src="{{asset('images/logos/onetouch .png')}}" alt="">
        </div>
        <div class="w-full p-3 bg-white rounded-lg shadow dark:border sm:max-w-md dark:bg-gray-800 dark:border-gray-700 dark:text-white">
            {{ $slot }}
        </div>
    </div>
</section>
<x-toast/>
</body>
</html>
