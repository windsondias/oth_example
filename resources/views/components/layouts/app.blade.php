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

    @stack('styles')
</head>
<body class="min-h-screen antialiased">
<div
    x-data="{
            hover: false,
            collapsed: {{ session('mary-sidebar-collapsed', 'false') }},
            show() {
                this.collapsed = false;
            },
            hide() {
                this.collapsed = true;
            },
            toggle() {
                this.collapsed = !this.collapsed;
                fetch('/mary/toogle-sidebar?collapsed=' + this.collapsed);
            }
        }"
    class="w-full mx-auto"
>
    <div class="drawer inline lg:grid lg:drawer-open">
        <input id="main-drawer" type="checkbox" class="drawer-toggle" @click="show"/>

        <x-layouts.sidebar/>

        <div class="drawer-content w-full">
            <x-layouts.navbar/>

            <main class="p-3 min-h-[calc(100vh-110px)]">
                {{ $slot }}
            </main>

            <x-layouts.footer/>
        </div>
    </div>
</div>
<x-toast/>

@stack('scripts')
</body>
</html>
