<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - PhuocIt95</title>
    {{-- <link rel="stylesheet" href="/build/assets/app-Cm8WSGZV.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script> --}}
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navigation />

        <x-section-heading heading="{{ $heading }}" description="{{ $description }}" />
        <div class="px-5 mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
        </main>
        <x-footer></x-footer>
    </div>

    {{-- <script src="/build/assets/app-QJMq9KiZ.js"></script> --}}
</body>

</html>
