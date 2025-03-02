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

    @if(session('success'))
        <div id="succes-alert" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg shadow-md fixed top-20 right-4 z-50">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div id="error-alert" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg shadow-md fixed top-20 right-4 z-50">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <script>
        setTimeout(() => {
            let successAlert = document.getElementById('success-alert');
            let errorAlert = document.getElementById('error-alert');

            if(successAlert) successAlert.style.display = 'none';
            if(errorAlert) errorAlert.style.display = 'none';
        }, 3000);
    </script>

</body>
</html>