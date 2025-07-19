<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['public/fontawesome/css/all.min.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/sb-admin-2.js'])
</head>

<body id="page-top">
    <div class="font-sans text-gray-900 antialiased">
        <x-slidebar>
            {{ $slot }}
        </x-slidebar>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Toastify -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Core plugin JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}

    @if (session('toast'))
        <script>
            Toastify({
                text: "{{ session('toast.message') }}",
                duration: 3000,
                gravity: "top",
                position: "center",
                backgroundColor: "{{ session('toast.type') === 'success' ? '#28a745' : '#dc3545' }}",
                stopOnFocus: true
            }).showToast();
        </script>
    @endif

</body>

</html>
