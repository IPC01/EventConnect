<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}@hasSection('title') - @yield('title')@endif</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
</head>
<body>
    

<div class="flex h-screen">
  @include('admin.layout.sidebar')
    <!-- Main Content -->
    <div class="main-content">
        @include('admin.layout.navbar')

        @yield('content')
    </div>
</div>
</body>
</html>
