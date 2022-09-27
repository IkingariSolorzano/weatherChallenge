<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>weatherChallenge</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center mt-1 py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-1 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">INICIO</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar sesión</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarme</a>
            @endif
            @endauth
        </div>
        @endif



        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            BIENVENIDO A NUESTRA APP DEL CLIMA
        </div>
    </div>
    </div>
    </div>
</body>

</html>