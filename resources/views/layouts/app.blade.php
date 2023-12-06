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
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter antialiased">

    <div class="h-screen bg-gray-100 dark:bg-gray-900 relative">
        @if (Session::has('message'))
            <div class="absolute z-[99] top-4 left-1/2 transform -translate-x-1/2 transition-all"
                x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform opacity-0 -translate-y-10"
                x-transition:enter-end="transform opacity-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="transform opacity-100"
                x-transition:leave-end="transform opacity-0 -translate-y-10">
                <div class="w-80 h-16 bg-green-50 flex items-center px-2 border-t-[4px] border-green-600">
                    <div class="">
                        <i class='bx bx-error-circle'></i>
                    </div>
                    <div class="ml-2">
                        <p class="font-inter-600 text-sm">Thành công</p>
                        <p class="font-inter-500 text-xs mt-1">{{ Session::get('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @include('layouts.sidebar')
    </div>

    <script>
        function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('image-preview');
        preview.style.display = "block";
        var reader = new FileReader();
        reader.onload = function() {
        preview.src = reader.result;
        };
        reader.readAsDataURL(input.files[0]);
        }
    </script>

</body>

</html>
