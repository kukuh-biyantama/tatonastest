<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>user management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Include Laravel Mix-generated CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- data tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layout.nav.nav')

        <!-- Page Content -->
        <main class="container">
            @yield('content')
        </main>
    </div>

    <!-- Include Laravel Mix-generated JS -->
    <script type="module" src="{{ mix('js/app.jsx') }}"></script>

    <!-- Include Vite-generated JS (using full URL to Vite development server) -->
    <script type="module" src="http://localhost:3000/@fs-uid/resources/js/app.jsx"></script>
    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#hardware').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#hardwaredetail').DataTable();
        });
    </script>
</body>

</html>