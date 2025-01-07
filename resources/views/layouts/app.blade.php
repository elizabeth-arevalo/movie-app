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
    <style>
        /* Colores */
        .btn-primary {
            background-color: #0f2d3c;
            border-color: #005546;
            color: #c8d2d7;
        }
        .btn-primary:hover {
            background-color: #0f2d3c;
            border-color: #003366;
            color: #c8d2d7;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #23272b;
        }
        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1a1c1e;
        }

        .btn-turquoise {
            background-color: #2eed97;
            border-color: #1ebe91;
        }
        .btn-turquoise:hover {
            background-color: #1ebe91;
            border-color: #005546;
        }

        .thead-dark {
            background-color: #0f2d3c;
            color: white;
        }

        .table {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #c8d2d7;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #c8d2d7;
        }

        .table-hover tbody tr:hover {
            background-color: #c8d2d7;
        }

        .table-responsive {
            margin-top: 20px;
            overflow-x: auto;
        }

        .btn-sm {
            font-size: 14px;
        }

        .btn-danger {
            background-color: #005546;
            color: #e0e0e0;
        }
        .btn-danger:hover {
            background-color: #005546;
            color: #e0e0e0;
        }

        .btn {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        /* Sombra en la tabla */
        .shadow-lg {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Alineación de botones */
        .d-flex {
            display: flex;
            justify-content: center;
        }

        .rounded-3 {
            border-radius: 8px;
        }

        /* Espaciado entre botones */
        .mb-4 {
            margin-bottom: 1.5rem;
        }

        /* Centrando tabla */
        .table-responsive {
            display: flex;
            justify-content: center;
        }

        .table {
            width: 100%;
            max-width: 100%;
            table-layout: fixed;
        }

        .floating-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #005546; /* Color del botón */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            font-size: 30px;
        }

        .floating-btn:hover {
            background-color: #0f2d3c;
        }

        .floating-btn i {
            font-size: 30px; /* Tamaño del ícono */
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-blue-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endisset
        </main>
    </div>
</body>
</html>
