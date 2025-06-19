<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}@hasSection('title') - @yield('title')@endif</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/dash.css') }}"> --}}

</head>
@include('shop.layout.navbar')
<!-- Conteúdo da Página -->
@yield('content')
@include('shop.layout.footer')
  <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1f1f2e;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #8056FF, #FF56B1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #FF56B1, #0BC4E2);
        }
    </style>

</html>



