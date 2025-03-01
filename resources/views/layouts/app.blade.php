<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root{
            --primary-color: #B1361E;
            --dark-bg: #1F1F1F;
            --light-bg: #2D2D2D;
            --text-light: #F7F7F7;
            --text-dark: #C0C0C0;
        }
    </style>

</head>

<body class="bg-[var(--dark-bg)] text-[var(--text.light)] flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-[var(--light-bg)] rounded-lg shadow-lg">
        @yield('content')
    </div>
    

</body>
</html>