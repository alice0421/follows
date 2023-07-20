<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="w-screen h-screen bg-white">
            <div class="w-[1200px] h-full mx-auto">
                <!-- Page Header -->
                <div class="flex justify-between items-center p-6">
                    <header>
                        {{ $header }}
                    </header>
                    @include('layouts.navigation')
                </div>

                <!-- Menu Bar -->
                <div class="px-6">
                    <a href="{{ route('daily.index') }}">
                        <x-primary-button type="button">ホーム</x-primary-button>
                    </a>
                    <a href="{{ route('daily.create') }}" class="ml-4">
                        <x-primary-button type="button">新規作成</x-primary-button>
                    </a>
                </div>

                <!-- Page Content -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
