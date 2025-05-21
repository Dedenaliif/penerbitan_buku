<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.head')
</head>
<body class="bg-white">
    <section class="bg-[#4285F4] py-6">
       @include('layout.navbar')
    </section>

@yield('content')
@stack('scripts')
</body>
</html>