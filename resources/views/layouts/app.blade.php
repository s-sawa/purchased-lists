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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <div class=" bg-gray-100 w-auto">
        @include('layouts.navigation')
        <!-- Page Content -->
        <main>
            <div class="text-center">
            </div>
            <div id="information" class="text-center">
                @if (session('successMessage'))
                <div class="successMessage text-green-600">
                    {{ session('successMessage') }}
                </div>
                @endif
            </div>
            {{ $content }}
            @include('components.edit-modal')
        </main>
    </div>
    <script src="{{ asset('/js/modal.js') }}"></script>
</body>

</html>