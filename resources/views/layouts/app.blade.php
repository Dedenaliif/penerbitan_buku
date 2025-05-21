<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRP</title>
    <!--Tailwind CSS-->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Bootstrap -->
</head>
<body>
    <section class="bg-[#4285F4] py-6">
        @include('layout.navbar')
     </section>

     @yield('content')
</body>
</html>
