<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-slate-200 text-black flex flex-row">
    @include('dashboard.templates.aside')
    @include('components.alerts')
    @include('dashboard.templates.globo')
    <div class="flex flex-col w-full">
        @include('dashboard.templates.nav')
        @yield('content')
    </div>
    {{-- @include('templates.footer') --}}
</body>

</html>
