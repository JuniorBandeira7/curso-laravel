<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>Header</header>
    <!-- yield é para conteúdo dinamico -->
    @yield('content')
    <footer>footer</footer>
</body>
</html>
