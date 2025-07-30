<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $title ?? config('app.name', 'Portefólio') }}</title>
        <!-- Tailwind CSS via CDN for rapid prototyping -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Livewire styles -->
        @livewireStyles
    </head>
    <body class="antialiased text-gray-900">
        {{ $slot }}
        <!-- Livewire scripts -->
        @livewireScripts
    </body>
</html>